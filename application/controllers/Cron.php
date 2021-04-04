<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cron extends CI_Controller 
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('input');
        $this->load->model('Cron_model');
    }
    
    /**
     * This function is used to update the age of users automatically
     * This function is called by cron job once in a day at midnight 00:00
     */
    public function sendForms()
    {            
        
        if($this->input->is_cli_request())
        {     
            require_once APPPATH.'third_party/PHPExcel.php';
            $this->load->model('User_model');
            $this->load->model('Holiday_model');
            $forms = $this->Holiday_model->getNewForms();
            foreach($forms as $form) {
                $managers = $this->User_model->getManagers($form['user_id']);
                foreach($managers as $m){
                    $this->export($m);
                    

                }
            }

            $this->cron_model->updateAge();
        }
        else
        {
            echo "You dont have access";
        }
    }

    public function export($m) {
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Holiday Form")->setDescription("New Forms for Holiday Leaves");
        // Assign cell values
        $objPHPExcel->setActiveSheetIndex(0);
        // /////////////////////////////////////////////////////
        $form_data = $this->Holiday_model->getFormsForManager($m['user_id']);
                    
        // /////////////////////////////////////////////////////
        
        $table_columns = array("First Name", "Last Name", "User Email", "User PhoneNumber", "Start Date", "End Date", "Remarks");
        $column = 0;
        foreach($table_column as $tc) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $tc);
            $column++;
        }
        $i = 2;
        foreach ($form_data as $fd) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i, $fd['first_name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i, $fd['last_name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i, $fd['email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i, $fd['phone_number']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i, $fd['start_date']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $i, $fd['end_date']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $i, $fd['remarks']);
          
            $i++;
        }
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
        header('Content-type: application/vnd.ms-excel');
        // It will be called file.xls
        header('Content-Disposition: attachment; filename="Holiday_Form_' . date('d-m-Y') . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');

        $subject = 'Please verify email from login';
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'pro.eu.turbo-smtp.com',
            'smtp_port' => 587,
            'smtp_user' => 'zorica@thegamesilo.com',
            'smtp_pass' => 'wg2Uh6qh',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
		       

        // SEND MAIL
        $this->load->library('email', $config);
        $this->email->from("company@holiday_task.uk", '');
        $this->email->to($m['user_email'], 'Holiday Forms');
        $this->email->subject('Holiday Form');
        $this->email->message("Here are new Forms for Holiday Leaves");
        $this->email->attach($objWriter->save('php://output'));
    
        try {
            if($this->email->send()) {
                $data = array('send'=> 1);
                foreach ($form_data as $fd) {
                    $this->Holiday_model->update($df['id'], $data);
                }
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>