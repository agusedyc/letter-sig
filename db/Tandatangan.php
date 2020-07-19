<?php
require_once('C:\xampp\htdocs\ci2\application\libraries\autoload.php');
//require_once('C:\xampp\htdocs\ci2\application\libraries\tcpdf\examples\tcpdf_include.php');
class Tandatangan extends CI_Controller{

	function __construct(){
		parent::__construct();
				$this->load->library('pdf1', 'form_validation');
        $this->load->model('M_rekmed');
        $this->load->helper(array('form', 'url', 'file'));

	}

  function index(){
		$this->load->view('v_tandatangan');
		$db = $this->load->database('default', TRUE);
        //fungsi fetch assocc database
        $id = $this->input->post();
        $this->db->where('id','');
        $hasil = $this->db->get('resmed_tb');
        $data = $hasil->row_array();

        $this->load->helper('url');        

	}

	function aksiupload(){
	
		//$filerm = $_FILES['filerm']['tmp_name'];
		//$cert = $_FILES['cert']['tmp_name'];
		//$priv = $_FILES['priv']['tmp_name'];

		$config=[
			'upload_path' => "./uploadfile/",
			'max_size' => "4086",
			'allowed_types' => "*",
			'file_name' => "cert",
			'overwrite' => TRUE,
			
	];   
	
	$this->load->library('upload', $config);
	$this->upload->do_upload('filerm');
	$filerm = $this->upload->data();
	echo "<pre>";
	print_r($filerm);
	echo "</pre>";
	
	$proses = $this->upload->do_upload('cert');
	$cert = $this->upload->data();
	echo "<pre>";
	print_r($cert);
	echo "</pre>";
	 
	 // script uplaod file kedua
	$this->upload->do_upload('priv');
	$priv = $this->upload->data();
	echo "<pre>";
	print_r($priv);
	echo "</pre>";


	
		class_exists('TCPDF', true);
		$pdf = new pdf(); 
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		 $row = $pdf->setSourceFile($filerm);
		              for($i=1;$i<=$row;$i++){  
		                $pdf->addPage();  
		                $tplIdx = $pdf->importPage($i);  
		                $pdf->useTemplate($tplIdx);  
		              }
		$infor = array(
			'Name' => 'RSUD Depok',
			'Location' => 'Office',
			'Reason' => 'Resume Medis RSUD Depok',
			'ContactInfo' => 'rsud@depok.go.id',
		);
		$style = array(
			'border' => false,
			'padding' => 0,
			'fgcolor' => array(128,0,0),
			'bgcolor' => false
	);
		$qr2 = 'dr. ' .','. 'Rumah Sakit Umum Daerah Depok';
		$pdf->write2DBarcode($qr2, 'QRCODE,H', 125, 12, 26, 30, $style, 'N');
		$pdf->setSignature(file_get_contents($cert), file_get_contents($priv), 'tcpdfdemo', '', 2, $infor);
						$pdf->Image('assets/img/bgsign.png', 122, 12, 76, 30);
										$pdf->SetFont('Times','',7);
										$pdf->SetXY(154, 14);
										$pdf->Write(0, 'Ditandatangani Secara Elektronik Oleh:'); 
										$pdf->SetFont('','B',8);    
										$pdf->SetXY(160, 18);
										$pdf->Write(0,'dr. ' );     
										$pdf->setSignatureAppearance(122, 12, 76, 30);
		$pdf->SetFont('Times','',10);
		$pdf->Cell(0,8,'',0,1);
		$pdf->Cell(0,2,'',0,1);
		
           
$pdf->Output('Resume Medis RSUD Depok signed.pdf');
//unlink($priv);  
//unlink($pub);

	}
}