<?php

class List_order extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('List_order_model', 'lom');
		$this->load->library('input_sanitizer');
	}

	public function index()
	{
		$params = $this->input_sanitizer->method('get')
			->string('term')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('tanda')
			->integer('instalasi')
			->string('poli')
			->string('ruangan')
			->value('array');

		$order_page = $this->lom->get_page($params);

		$parse = array (
			'title'	     => 'List Order',
			'main_menu'  => 'list_order',
            'content'    => 'content/list_order/index',
            'order_page' => $order_page,
            'input'      => $params,
		);

		$this->load->view('layouts/wrapper', $parse);
	}

	public function index__table_part()
	{
		$params = $this->input_sanitizer->method('get')
			->string('term')
			->string('tanda')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('instalasi')
			->string('poli')
			->string('ruangan')
			->value('array');

		extract($params);

		$order_page = $this->lom->get_page($params);

		$base_view = 'content/list_order/index';

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				'table_rows' => $this->load->view($base_view.'.table-rows.php', ['data' => $order_page->data], TRUE),
				'pagination' => $this->load->view($base_view.'.pagination.php', (Array) $order_page->pagination, TRUE),
			]));
	}

	public function hapus_old($no_tran = NULL)
	{
		//if(empty($no_tran)) return show_404();

		//if($this->input->method() != 'post')
		//{
		//	return $this->output->set_status_header(403, 'Forbidden')->set_output('403: Forbidden');
		//}

		$hapus = $this->lom->hapus($no_tran);
		echo json_encode($hapus);

		//redirect($this->input->get('redirect_to'));
	}
	
	public function hapus()
	{
		$no_tran = $this->input->post('notran');
		$hapus = $this->lom->hapus($no_tran);

		echo json_encode($hapus);
	}

	public function export()
	{
		$tgl_awal = $this->input->get("tglawal");
		$tgl_akhir = $this->input->get("tglakhir");
		$instalasi = $this->input->get("instalasi");
		$tanda = $this->input->get("tanda");
		// print_r($tgl_awal);die();
		$hasil = $this->lom->get_order_lab($tgl_awal, $tgl_akhir, $instalasi, $tanda);
		$data = array
		(
			'data'		=> $hasil,
			'tgl_awal'	=> $tgl_awal != '' ? $tgl_awal : $tgl_awal,
			'tgl_akhir'	=> $tgl_akhir != '' ? $tgl_akhir : $tgl_akhir,
			'instalasi'	=> $instalasi
		);
		$this->load->view('content/list_order/export_excel', $data);
	}

	public function print_order()
	{
		$notran = $this->input->get("notrans");
		$hasil = $this->lom->get_data_order($notran);
		$data = array
		(
			'register'		=> $hasil['head'],
			'detail'		=> $hasil['detail'],
		);
		// echo'<pre>'; print_r($data); die();
		$this->load->view('content/list_order/print_order', $data);
	}

	public function export1(){

		// Load plugin PHPExcel nya
		// include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$this->load->library('Excel');  
		   
		// Create new PHPExcel object  
		$excel = new PHPExcel();  

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('RSAUESNAWAN')
							   ->setLastModifiedBy('RSAUESNAWAN')
							   ->setTitle("Download Order")
							   ->setSubject("ORDER LAB")
							   ->setDescription("Order Laboratorium")
							   ->setKeywords("Order_lab");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "ORDER LABORATORIUM"); 
		$excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO TRANSAKSI");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NO LAB"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NO REGISTRASI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "NO RM"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TANGGAL"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "NAMA"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "KATEGORI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "INSTALASI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "POLI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "KELAS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "ALAMAT"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "CATATAN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "TINDAKAN"); 

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);

		$tgl_awal = $this->input->post("tglawal");
		$tgl_akhir = $this->input->post("tglakhir");
		$hasil = $this->lom->get_order_lab($tgl_awal, $tgl_akhir);

		$no = 1; 
		$numrow = 4;
		foreach($hasil as $data){ 
			if(!empty($data->NmPoli) && !empty($data->NmBangsal)){
		        $asal = $data->NmPoli.' / '. $data->NmBangsal;
	        }elseif(!empty($data->NmPoli)){
	          $asal = $data->NmPoli;
	        }
	         elseif(!empty($data->NmBangsal)){
	          $asal = $data->NmBangsal;
	        }
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->NoTran);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->NoLab);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->Regno);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->Medrec);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, date('d-m-Y', strtotime($data->Tanggal)));
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->Firstname);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->NmKategori);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->Instalasi);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $asal);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->NmKelas);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->Address);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->Catatan);
			$tindakan = $this->lom->get_tindakan_pasien($data->NoTran);
			foreach ($tindakan as $key ) {
				$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow++, $key->NmTarif);				
			}
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			// $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(35); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		// $excel->getActiveSheet(0)->setTitle("Order Lab");
		// $excel->setActiveSheetIndex(0);
		// ob_end_clean();
		// // Proses file excel
		// // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		// header('Content-Type: application/vnd.ms-excel'); 
		// header('Content-Disposition: attachment; filename="Order Lab.xlsx"'); // Set nama file excel nya
		// header('Cache-Control: max-age=0');

		// $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');

		// // $write->save('php://output');
		// $this->SaveViaTempFile($write);


		$filename = "ORDER LAB";
        ob_end_clean();
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');          
        $object_writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');                
        $object_writer->save('php://output');
        // $this->SaveViaTempFile($object_writer);

	}

	function download_rekap()
    {   
		$this->load->library('Excel');  
		$idProjectJenis = $this->input->post('id_project_jenis');
		$id_project = $this->input->post('id_project');
		$periode = $this->input->post('periode_bulan');
		$dataBilling = $this->Mbilling->get_data_rekap($periode,$idProjectJenis,$id_project);

		$objPHPExcel = new PHPExcel();       
		
        // $objPHPExcel = PHPExcel_IOFactory::load(APPPATH.'third_party/billing/rekap.xlsx');
        $objPHPExcel->getProperties()->setCreator("PT. PROPERNAS GRIYA UTAMA")  
                ->setLastModifiedBy("PT. PROPERNAS GRIYA UTAMA")  
                ->setTitle("REKAP BILLING")  
                ->setSubject("REKAP BILLING DOCUMENT")  
                ->setDescription("REKAP BILLING , generated by PT. PROPERNAS GRIYA UTAMA.")  
                ->setKeywords("REKAP BILLING")  
                ->setCategory("REKAP BILLING"); 

		$objPHPExcel->setActiveSheetIndex(0);              
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No. BAST')->getStyle("A1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);     
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nama Pemilik')->getStyle("B1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'NDR Unit')->getStyle("E1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Type')->getStyle("D1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Blok')->getStyle("C1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Guna Listrik')->getStyle("F1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Guna Air')->getStyle("G1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'IPL')->getStyle("H1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Total Listrik')->getStyle("I1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Total Air')->getStyle("J1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Tagihan Bulan Ini')->getStyle("K1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Total Seluruh Tagihan')->getStyle("L1")->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('rgb' => '000000')
					)
				)
			)
		)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    
        $rowCount = 2;
		
        foreach($dataBilling as $row) {                
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, '')->getStyle("A$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);     
			
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row->nama)->getStyle("B$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			); 
			
			
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row->blok_unit)->getStyle("C$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			); 
			
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row->nm)->getStyle("D$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			); 

			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row->ndr_unit)->getStyle("E$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			); 
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, number_format($row->guna_listrik))->getStyle("F$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			); 
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, number_format($row->guna_air))->getStyle("G$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, number_format($row->ipl))->getStyle("H$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			); 

			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, number_format($row->total_listrik))->getStyle("I$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, number_format($row->total_air))->getStyle("J$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
			); 
			
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, number_format($row->tagihan_bulan_ini))->getStyle("K$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
            ); 

            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, number_format($row->total_tagihan))->getStyle("L$rowCount")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
            ); 
                                 
            // $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $i++);
            // $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row->nama);        
            // $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row->pangkat.' '. $row->nm_korps);
            // $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row->tmt_masuk);
            // $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row->tmt_pangkat); // pangkat terakhir
            // $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row->jabatan);
            // $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row->tmt_jabatan);
            // $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row->pend_umum_akhir); // pend umum
            // $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row->pend_tni_akhir); // pend AL
            // $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row->k_tk);
            // $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row->agama);
            // $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row->status_rumah);
            // $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row->alamat);
            $rowCount++;
        }
                
        $filename = "REKAP BILLING";
        ob_end_clean();
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');          
        $object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');                
        $object_writer->save('php://output');
    }

}
