
<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class reportepdf extends CI_Controller {
   
    public function index(){

        $this->load->view('welcome');

    }
    function pdf($id){
            
           require('fpdf/fpdf.php');

           require('conexion.php');
            
        // $llego=$_GET['id'];
        // desde aqui estoy haciendo las consultas para que jale de la base de datos
         $query = "SELECT fp.fecha,pe.cantidad,pe.unidad,pr.descripcion,pe.observacion
                     from form_pedido fp,producto pr,pedido pe
                      where fp.id_fp=$id
                      and fp.id_fp=pe.id_fp
                      and pe.id_producto=pr.id_producto 
                       ";
         $resultado = $mysqli->query($query);
         
         $mostrarformu = "SELECT motivo,destino
                     from form_pedido
                     where id_fp=$id
                       ";
         $res = $mysqli->query($mostrarformu);

         $mostrarfecha = "SELECT fecha,mes
                     from form_pedido
                     where id_fp=$id
                       ";
         $resfecha = $mysqli->query($mostrarfecha);

        // hasta aqui  pero les asigne id_formulario 

         $pdf = new FPDF(); //Creamos un objeto de la librería


         $pdf->AddPage();   //agregamos una nueva pagina
         $pdf->SetFont('Arial','B',8);//tipoletra, estilo bold subrayado , tamano
         $pdf->ln(6);
         $pdf->Cell(38,4,'POLICIA BOLIVIANA', 0, 0, 'R');
         $pdf->Cell(245,4,'Departamento Administravio', 0, 1, 'C');
         $pdf->SetX(30);
         $pdf->Cell(30,4,'ACADEMIA NACIONAL DE POLICIAS', 0, 0, 'R');
         $pdf->Cell(220,4,'Seccion Economato', 0, 1, 'C');
         $pdf->SetX(30);
         $pdf->Cell(15,4,'La Paz - Bolivia', 0, 1, 'R');



         $pdf->ln(10);
         $pdf->SetFont('Arial','B',15);
         $pdf->Cell(200,10,'FORMULARIO DE PEDIDO', 0, 1,'C' );

          //largo de la celda , alto celda , texto,
         // 1=borde 0 =eacion
         $pdf->SetFont('Arial','B',11);
         
         $pdf->SetX(30);
         $pdf->Cell(46,6,'UNIDAD ACADEMICA:  "ANAPOL" ', 0, 1, 'R');
         $pdf->SetX(20);
         while($row = $resfecha->fetch_assoc())
         {
            $pdf->SetFillColor(232,232,232);
            $pdf->SetFont('Arial','B',9);
         $pdf->Cell(22,5,'MES', 0,0,'L',0);
         $pdf->Cell(170,5,utf8_decode($row['mes']), 0,1,'L',0);
         $pdf->Cell(22,5,'FECHA', 0,0,'C',0);
         $pdf->Cell(170,5,utf8_decode($row['fecha']), 0,1,'L',0);
         $pdf->ln(8);
         
        }
         $pdf->SetFillColor(232,232,232);
         $pdf->SetFont('Arial','B',11);
         $pdf->SetX(17);
         $pdf->Cell(25,10,'CANTIDAD', 1,0,'C',1);
         $pdf->Cell(25,10,'UNIDAD', 1,0,'C',1);
         $pdf->Cell(85,10,'DESCRIPCION DEL PRODUCTO', 1,0,'C',1);
         $pdf->Cell(42,10,'OBSERVACIONES', 1,1,'C',1);
             //largo celd, alto celd, text, bord 0 o 1, alineacion, fondo
             
             while($row = $resultado->fetch_assoc())
             {
                
                $pdf->SetFillColor(232,232,232);
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(17);
                $pdf->Cell(25,7,$row['cantidad'], 1,0,'C');
                $pdf->Cell(25,7,utf8_decode($row['unidad']), 1,0,'C');
                $pdf->Cell(85,7,utf8_decode($row['descripcion']), 1,0,'C');
                $pdf->Cell(42,7,utf8_decode($row['observacion']), 1,1,'C');
             }
             
             
             $pdf->ln(8);
             $pdf->SetFont('Arial','B',11);
             while($row = $res->fetch_assoc())
             {
                $pdf->SetFont('Arial','B',9);
             $pdf->Cell(22,8,'MOTIVO', 1,0,'C',1);
             $pdf->Cell(170,8,utf8_decode($row['motivo']), 1,1,'C',0);
             $pdf->Cell(22,8,'DESTINO', 1,0,'C',1);
             $pdf->Cell(170,8,utf8_decode($row['destino']), 1,1,'C',0);
             $pdf->ln(8);
             
            }
             
             $pdf->SetFillColor(232,232,232);
             $pdf->SetFont('Arial','B',8);
             
             $pdf->Cell(95,50,'', 0,0,'C',0);
             $pdf->Cell(95,50,'', 0,1,'C',0);
             $pdf->Cell(95,3,'Sgto. Alfredo Ramos Aruquipa', 0,0,'C',0);
             $pdf->Cell(95,3,'Sgto. Alfredo Ramos Aruquipa', 0,1,'C',0);
             $pdf->Cell(95,3,'C.I.No. 3487813 LP.', 0,0,'C');
             $pdf->Cell(95,3,'C.I.No. 3487813 LP.', 0,1,'C');
             $pdf->Cell(95,3,'ECONOMO UNIDAD ACADEMICA', 0,0,'C',0);
             $pdf->Cell(95,3,'ECONOMO UNIDAD ACADEMICA', 0,1,'C',0);
             $pdf->Cell(95,3,'SOLICITUD', 0,0,'C',0);
             $pdf->Cell(95,3,'SOLICITUD', 0,1,'C',0);
             
           

             $pdf->Cell(190,50,'', 0,1,'C',0);
             $pdf->Cell(190,3,'Sgto. Alfredo Ramos Aruquipa', 0,1,'C',0);
             $pdf->Cell(190,3,'C.I.No. 3487813 LP.', 0,1,'C');
             $pdf->Cell(190,3,'ECONOMO UNIDAD ACADEMICA', 0,1,'C',0);
             $pdf->Cell(190,3,'SOLICITUD', 0,1,'C',0);
 

          $pdf->Output('Formulario_Pedido_#_'.$id.'.pdf','I');       //para mostrar el pdf
//}


        //echo $this->fpdf->output('Biblioteca_FPDF.pdf','D');
    }
    function pdfentrega($id){
         require('fpdf/fpdf.php');

 require('conexion.php');
    
 
 //$queryy = "SELECT f.fecha FROM form_pedido f where f.id_fe=1  ";
 //$resul = $mysqli->query($queryy);
  
// desde aqui estoy haciendo las consultas para que jale de la base de datos
 $query = "SELECT fp.fecha,pe.cantidad,pe.unidad,pr.descripcion,pe.observacion
             from form_pedido fp,producto pr,pedido pe
              where fp.id_fp=2
              and fp.id_fp=pe.id_fp
              and pe.id_producto=pr.id_producto 
               ";
 $resultado = $mysqli->query($query);
 
 $mostrarformu = "SELECT motivo,destino
             from form_pedido
             where id_fp=2
               ";
 $res = $mysqli->query($mostrarformu);

 $mostrarfecha = "SELECT fecha,mes
             from form_pedido
             where id_fp=2
               ";
 $resfecha = $mysqli->query($mostrarfecha);

// hasta aqui  pero les asigne id_formulario 

 $pdf = new FPDF(); //Creamos un objeto de la librería


 $pdf->AddPage();   //agregamos una nueva pagina
 $pdf->SetFont('Arial','B',8);//tipoletra, estilo bold subrayado , tamano
 $pdf->ln(6);
 $pdf->Cell(45,4,'POLICIA BOLIVIANA', 0, 0, 'R');
 $pdf->Cell(245,4,'', 0, 1, 'C');
 $pdf->SetX(30);
 $pdf->Cell(38,4,'ACADEMIA NACIONAL DE POLICIAS', 0, 0, 'R');
 $pdf->Cell(220,4,'', 0, 1, 'C');
 $pdf->SetX(30);
 $pdf->Cell(22,4,'La Paz - Bolivia', 0, 1, 'R');



 $pdf->ln(8);
 $pdf->SetFont('Arial','B',15);
 $pdf->Cell(200,10,'ACTA DE ENTREGA DEL PRODUCTO AL ECONOMO', 0, 1,'C' );

  //largo de la celda , alto celda , texto,
 // 1=borde 0 =eacion
 $pdf->SetFont('Arial','B',8);
 $pdf->SetX(30);
 $pdf->Cell(30,6,'LUGAR  : LA PAZ ', 0, 1, 'R');
 $pdf->SetX(30);
 $pdf->Cell(46,6,'FECHA : 01 DE FREBRERO 2018 ', 0, 1, 'R');
 $pdf->SetX(30);
 $pdf->Cell(46,6,'UNIDAD ACADEMICA:  "ANAPOL" ', 0, 1, 'R');
 $pdf->SetX(20);
 //while($row = $resfecha->fetch_assoc())
 //{
    //$pdf->SetFillColor(232,232,232);
   // $pdf->SetFont('Arial','B',9);
 //$pdf->Cell(22,5,'MES', 0,0,'L',0);
 //$pdf->Cell(170,5,utf8_decode($row['mes']), 0,1,'L',0);
 //$pdf->Cell(22,5,'FECHA', 0,0,'C',0);
 //$pdf->Cell(170,5,utf8_decode($row['fecha']), 0,1,'L',0);
 //$pdf->ln(8); 
//}
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',11);
 $pdf->SetX(17);
 $pdf->Cell(25,10,'CANTIDAD', 1,0,'C',1);
 $pdf->Cell(25,10,'UNIDAD', 1,0,'C',1);
 $pdf->Cell(85,10,'DESCRIPCION DEL PRODUCTO', 1,0,'C',1);
 $pdf->Cell(42,10,'OBSERVACIONES', 1,1,'C',1);
     //largo celd, alto celd, text, bord 0 o 1, alineacion, fondo
     
     while($row = $resultado->fetch_assoc())
     {
        
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(17);
        $pdf->Cell(25,7,$row['cantidad'], 1,0,'C');
        $pdf->Cell(25,7,utf8_decode($row['unidad']), 1,0,'C');
        $pdf->Cell(85,7,utf8_decode($row['descripcion']), 1,0,'C');
        $pdf->Cell(42,7,utf8_decode($row['observacion']), 1,1,'C');
     }
     
     
     $pdf->ln(8);
     $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',11);
    // while($row = $res->fetch_assoc())
     //{
       // $pdf->SetFillColor(232,232,232);
        //$pdf->SetFont('Arial','B',9);
     //$pdf->Cell(22,8,'MOTIVO', 1,0,'C',1);
     //$pdf->Cell(170,8,utf8_decode($row['motivo']), 1,1,'C',0);
     //$pdf->Cell(22,8,'DESTINO', 1,0,'C',1);
     //$pdf->Cell(170,8,utf8_decode($row['destino']), 1,1,'C',0);
     //$pdf->ln(8);
     
    //}
    $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',8);
     $pdf->Cell(120,7,'RECEPCION EFECTUADA PREVIA', 1,0,'C');
     $pdf->Cell(70,7,'     ', 1,1,'C',0);
     $pdf->Cell(120,7,'VERIFICACION DEL PRODUCTO CONFORME A REQUERIMIENTO', 1,0,'C',0);
     $pdf->Cell(70,7,'     ', 1,1,'C',0);
     $pdf->Cell(120,7,'CUMPLIMIENTO DE PLAZO DE ENTREGA', 1,0,'C',0);
     $pdf->Cell(70,7,'     ', 1,1,'C',0);

     $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',8);
     
     $pdf->Cell(95,50,'', 0,0,'C',0);
     $pdf->Cell(95,50,'', 0,1,'C',0);
     $pdf->Cell(95,3,'Sgto. Alfredo Ramos Aruquipa', 0,0,'C',0);
     $pdf->Cell(95,3,'My. Maycoln B. Rojas Torrez', 0,1,'C',0);
     $pdf->Cell(95,3,'C.I.No. 3487813 LP.', 0,0,'C');
     $pdf->Cell(95,3,'C.I.No. 4875304 LP.', 0,1,'C');
     $pdf->Cell(95,3,'ECONOMO DE ANAPOL', 0,0,'C',0);
     $pdf->Cell(95,3,'JEFE ADMINISTRATIVO DE ANAPOL', 0,1,'C',0);
     $pdf->Cell(95,3,'RECIBI CONFORME', 0,0,'C',0);
     $pdf->Cell(95,3,'ENTREGUE CONFORME', 0,1,'C',0);
     
   

     $pdf->Cell(190,50,'', 0,1,'C',0);
     $pdf->Cell(190,3,'Cnl. DESP. Gonzalo Rene Garvizu Cordova', 0,1,'C',0);
     $pdf->Cell(190,3,'C.I.No. 1099499 CH.', 0,1,'C');
     $pdf->Cell(190,3,'DIRECTOR', 0,1,'C',0);
     $pdf->Cell(190,3,'ACADEMIA NACIONAL DE POLICIAS', 0,1,'C',0);



 $pdf->Output();    
    }


    function pdfrecepcion($id){

 //Agregamos la libreria FPDF
 require('fpdf/fpdf.php');

 require('conexion.php');
    
 
 //$queryy = "SELECT f.fecha FROM form_pedido f where f.id_fe=1  ";
 //$resul = $mysqli->query($queryy);
  
// desde aqui estoy haciendo las consultas para que jale de la base de datos
 $query = "SELECT fp.fecha,pe.cantidad,pe.unidad,pr.descripcion,pe.observacion
             from form_pedido fp,producto pr,pedido pe
              where fp.id_fp=2
              and fp.id_fp=pe.id_fp
              and pe.id_producto=pr.id_producto 
               ";
 $resultado = $mysqli->query($query);
 
 $mostrarformu = "SELECT motivo,destino
             from form_pedido
             where id_fp=2
               ";
 $res = $mysqli->query($mostrarformu);

 $mostrarfecha = "SELECT fecha,mes
             from form_pedido
             where id_fp=2
               ";
 $resfecha = $mysqli->query($mostrarfecha);

// hasta aqui  pero les asigne id_formulario 

 $pdf = new FPDF(); //Creamos un objeto de la librería


 $pdf->AddPage();   //agregamos una nueva pagina
 $pdf->SetFont('Arial','B',8);//tipoletra, estilo bold subrayado , tamano
 $pdf->ln(6);
 $pdf->Cell(45,4,'POLICIA BOLIVIANA', 0, 0, 'R');
 $pdf->Cell(245,4,'', 0, 1, 'C');
 $pdf->SetX(30);
 $pdf->Cell(38,4,'ACADEMIA NACIONAL DE POLICIAS', 0, 0, 'R');
 $pdf->Cell(220,4,'', 0, 1, 'C');
 $pdf->SetX(30);
 $pdf->Cell(22,4,'La Paz - Bolivia', 0, 1, 'R');



 $pdf->ln(8);
 $pdf->SetFont('Arial','B',15);
 $pdf->Cell(200,10,'ACTA DE RECEPCION DEL PRODUCTO', 0, 1,'C' );

  //largo de la celda , alto celda , texto,
 // 1=borde 0 =eacion
 $pdf->SetFont('Arial','B',8);
 $pdf->SetX(30);
 $pdf->Cell(30,6,'LUGAR  : LA PAZ ', 0, 1, 'R');
 $pdf->SetX(30);
 $pdf->Cell(46,6,'FECHA : 01 DE FREBRERO 2018 ', 0, 1, 'R');
 $pdf->SetX(30);
 $pdf->Cell(46,6,'UNIDAD ACADEMICA:  "ANAPOL" ', 0, 1, 'R');
 $pdf->SetX(20);
 $pdf->Cell(60,6,'FORMULARIO DE PEDIDO : 31/01/2019 ', 0, 1, 'R');
 $pdf->SetX(20);
 //while($row = $resfecha->fetch_assoc())
 //{
    //$pdf->SetFillColor(232,232,232);
   // $pdf->SetFont('Arial','B',9);
 //$pdf->Cell(22,5,'MES', 0,0,'L',0);
 //$pdf->Cell(170,5,utf8_decode($row['mes']), 0,1,'L',0);
 //$pdf->Cell(22,5,'FECHA', 0,0,'C',0);
 //$pdf->Cell(170,5,utf8_decode($row['fecha']), 0,1,'L',0);
 //$pdf->ln(8); 
//}
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',11);
 $pdf->SetX(17);
 $pdf->Cell(25,10,'CANTIDAD', 1,0,'C',1);
 $pdf->Cell(25,10,'UNIDAD', 1,0,'C',1);
 $pdf->Cell(85,10,'DESCRIPCION DEL PRODUCTO', 1,0,'C',1);
 $pdf->Cell(42,10,'OBSERVACIONES', 1,1,'C',1);
     //largo celd, alto celd, text, bord 0 o 1, alineacion, fondo
     
     while($row = $resultado->fetch_assoc())
     {
        
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(17);
        $pdf->Cell(25,7,$row['cantidad'], 1,0,'C');
        $pdf->Cell(25,7,utf8_decode($row['unidad']), 1,0,'C');
        $pdf->Cell(85,7,utf8_decode($row['descripcion']), 1,0,'C');
        $pdf->Cell(42,7,utf8_decode($row['observacion']), 1,1,'C');
     }
     
     
     $pdf->ln(8);
     $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',11);
    // while($row = $res->fetch_assoc())
     //{
       // $pdf->SetFillColor(232,232,232);
        //$pdf->SetFont('Arial','B',9);
     //$pdf->Cell(22,8,'MOTIVO', 1,0,'C',1);
     //$pdf->Cell(170,8,utf8_decode($row['motivo']), 1,1,'C',0);
     //$pdf->Cell(22,8,'DESTINO', 1,0,'C',1);
     //$pdf->Cell(170,8,utf8_decode($row['destino']), 1,1,'C',0);
     //$pdf->ln(8);
     
    //}
    $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',8);
     $pdf->Cell(120,5,'           ', 1,0,'C');
     $pdf->Cell(70,5,'     ', 1,1,'C',0);
     $pdf->Cell(120,5,'           ', 1,0,'C');
     $pdf->Cell(70,5,'     ', 1,1,'C',0);
     $pdf->Cell(120,5,'         ', 1,0,'C',0);
     $pdf->Cell(70,5,'     ', 1,1,'C',0);
     $pdf->Cell(120,5,'OTROS    ', 1,0,'C',0);
     $pdf->Cell(70,5,'     ', 1,1,'C',0);

     $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',8);
     
     $pdf->Cell(95,50,'', 0,0,'C',0);
     $pdf->Cell(95,50,'', 0,1,'C',0);
     $pdf->Cell(95,3,'Sgto. Alfredo Ramos Aruquipa', 0,0,'C',0);
     $pdf->Cell(95,3,'Sra. Silvia Callisaya D.', 0,1,'C',0);
     $pdf->Cell(95,3,'C.I.No. 3487813 LP.', 0,0,'C');
     $pdf->Cell(95,3,'C.I.No. 6074147 LP.', 0,1,'C');
     $pdf->Cell(95,3,'ECONOMO', 0,0,'C',0);
     $pdf->Cell(95,3,'PROVEEDORA', 0,1,'C',0);
     $pdf->Cell(95,3,'RECIBI CONFORME', 0,0,'C',0);
     $pdf->Cell(95,3,'ENTREGUE CONFORME', 0,1,'C',0);
     
     $pdf->Cell(95,50,'', 0,0,'C',0);
     $pdf->Cell(95,50,'', 0,1,'C',0);
     $pdf->Cell(95,3,'My. Maycoln B. Rojas Torrez', 0,0,'C',0);
     $pdf->Cell(95,3,'Cnl.DESP. Gonzalo Rene Garvizu Cordova', 0,1,'C',0);
     $pdf->Cell(95,3,'C.I.No. 4875304 LP.', 0,0,'C');
     $pdf->Cell(95,3,'C.I.No. 1099499 CH.', 0,1,'C');
     $pdf->Cell(95,3,'JEFE ADMINISTRATIVO', 0,0,'C',0);
     $pdf->Cell(95,3,'DIRECTOR', 0,1,'C',0);
     $pdf->Cell(95,3,'ANAPOL', 0,0,'C',0);
     $pdf->Cell(95,3,'ACADEMIA NACIONAL DE POLICIAS', 0,1,'C',0);

    



 $pdf->Output();    
    }


    function pdfcocina($id){
         //Agregamos la libreria FPDF
 require('fpdf/fpdf.php');

 require('conexion.php');
    
 
 //$queryy = "SELECT f.fecha FROM form_pedido f where f.id_fe=1  ";
 //$resul = $mysqli->query($queryy);
  
// desde aqui estoy haciendo las consultas para que jale de la base de datos
 $query = "SELECT fp.fecha,pe.cantidad,pe.unidad,pr.descripcion,pe.observacion
             from form_pedido fp,producto pr,pedido pe
              where fp.id_fp=2
              and fp.id_fp=pe.id_fp
              and pe.id_producto=pr.id_producto 
               ";
 $resultado = $mysqli->query($query);
 
 $mostrarformu = "SELECT motivo,destino
             from form_pedido
             where id_fp=2
               ";
 $res = $mysqli->query($mostrarformu);

 $mostrarfecha = "SELECT fecha,mes
             from form_pedido
             where id_fp=2
               ";
 $resfecha = $mysqli->query($mostrarfecha);

// hasta aqui  pero les asigne id_formulario 

 $pdf = new FPDF(); //Creamos un objeto de la librería


 $pdf->AddPage();   //agregamos una nueva pagina
 $pdf->SetFont('Arial','B',8);//tipoletra, estilo bold subrayado , tamano
 $pdf->ln(6);
 $pdf->Cell(38,4,'POLICIA BOLIVIANA', 0, 0, 'R');
 $pdf->Cell(245,4,'     ', 0, 1, 'C');
 $pdf->SetX(30);
 $pdf->Cell(30,4,'ACADEMIA NACIONAL DE POLICIAS', 0, 0, 'R');
 $pdf->Cell(220,4,'     ', 0, 1, 'C');
 $pdf->SetX(30);
 $pdf->Cell(15,4,'La Paz - Bolivia', 0, 1, 'R');



 $pdf->ln(7);
 $pdf->SetFont('Arial','B',15);
 $pdf->Cell(200,10,'ACTA DE ENTREGA DEL PRODUCTO A COCINA', 0, 1,'C' );

  //largo de la celda , alto celda , texto,
 // 1=borde 0 =eacion
 $pdf->SetFont('Arial','B',9);
 $pdf->SetX(30);
 $pdf->Cell(30,6,'LUGAR  : LA PAZ ', 0, 1, 'R');
 $pdf->SetX(30);
 $pdf->Cell(46,6,'FECHA : 01 DE FREBRERO 2018 ', 0, 1, 'R');
 $pdf->SetX(30);
 $pdf->Cell(46,6,'UNIDAD ACADEMICA:  "ANAPOL" ', 0, 1, 'R');
 $pdf->SetX(20);
 //while($row = $resfecha->fetch_assoc())
 //{
    //$pdf->SetFillColor(232,232,232);
   // $pdf->SetFont('Arial','B',9);
 //$pdf->Cell(22,5,'MES', 0,0,'L',0);
 //$pdf->Cell(170,5,utf8_decode($row['mes']), 0,1,'L',0);
 //$pdf->Cell(22,5,'FECHA', 0,0,'C',0);
 //$pdf->Cell(170,5,utf8_decode($row['fecha']), 0,1,'L',0);
 //$pdf->ln(8); 
//}
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',11);
 $pdf->SetX(17);
 $pdf->Cell(25,10,'CANTIDAD', 1,0,'C',1);
 $pdf->Cell(25,10,'UNIDAD', 1,0,'C',1);
 $pdf->Cell(85,10,'DESCRIPCION DEL PRODUCTO', 1,0,'C',1);
 $pdf->Cell(42,10,'OBSERVACIONES', 1,1,'C',1);
     //largo celd, alto celd, text, bord 0 o 1, alineacion, fondo
     
     while($row = $resultado->fetch_assoc())
     {
        
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(17);
        $pdf->Cell(25,7,$row['cantidad'], 1,0,'C');
        $pdf->Cell(25,7,utf8_decode($row['unidad']), 1,0,'C');
        $pdf->Cell(85,7,utf8_decode($row['descripcion']), 1,0,'C');
        $pdf->Cell(42,7,utf8_decode($row['observacion']), 1,1,'C');
     }
     
     
     $pdf->ln(8);
     $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',11);
    // while($row = $res->fetch_assoc())
     //{
       // $pdf->SetFillColor(232,232,232);
        //$pdf->SetFont('Arial','B',9);
     //$pdf->Cell(22,8,'MOTIVO', 1,0,'C',1);
     //$pdf->Cell(170,8,utf8_decode($row['motivo']), 1,1,'C',0);
     //$pdf->Cell(22,8,'DESTINO', 1,0,'C',1);
     //$pdf->Cell(170,8,utf8_decode($row['destino']), 1,1,'C',0);
     //$pdf->ln(8);
     
    //}
    $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',8);
     $pdf->Cell(120,7,'RECEPCION EFECTUADA PREVIA', 1,0,'C');
     $pdf->Cell(70,7,'     ', 1,1,'C',0);
     $pdf->Cell(120,7,'VERIFICACION DEL PRODUCTO CONFORME A REQUERIMIENTO', 1,0,'C',0);
     $pdf->Cell(70,7,'     ', 1,1,'C',0);
     $pdf->Cell(120,7,'CUMPLIMIENTO DE PLAZO DE ENTREGA', 1,0,'C',0);
     $pdf->Cell(70,7,'     ', 1,1,'C',0);

     $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial','B',8);
     
     $pdf->Cell(65,50,'', 0,0,'C',0);
     $pdf->Cell(65,50,'', 0,0,'C',0);
     $pdf->Cell(65,50,'', 0,1,'C',0);
     $pdf->Cell(65,3,'Sgto. Alfredo Ramos Aruquipa', 0,0,'C',0);
     $pdf->Cell(65,3,'Cbo. Desiderio Huasco Sirpa', 0,0,'C',0);
     $pdf->Cell(65,3,'Sof. 2do. Santiago Sea Chui', 0,1,'C',0);
     $pdf->Cell(65,3,'C.I.No. 3487813 LP.', 0,0,'C');
     $pdf->Cell(65,3,'C.I.No.  LP.', 0,0,'C');
     $pdf->Cell(65,3,'C.I.No.  LP.', 0,1,'C');
     $pdf->Cell(65,3,'ECONOMO', 0,0,'C',0);
     $pdf->Cell(65,3,'COCINERO', 0,0,'C',0);
     $pdf->Cell(65,3,'COCINERO', 0,1,'C',0);
     $pdf->Cell(65,3,'ENTREGUE CONFORME', 0,0,'C',0);
     $pdf->Cell(65,3,'RECIBI CONFORME', 0,0,'C',0);
     $pdf->Cell(65,3,'RECIBI CONFORME', 0,1,'C',0);
     
    
     $pdf->Cell(95,50,'', 0,0,'C',0);
     $pdf->Cell(95,50,'', 0,1,'C',0);
     $pdf->Cell(95,3,'My Maycoln B. Rojas Torrez', 0,0,'C',0);
     $pdf->Cell(95,3,'Cnl. DESP. Gonzalo R. Garvizu Cordova', 0,1,'C',0);
     $pdf->Cell(95,3,'C.I.No. 4875304 LP.', 0,0,'C');
     $pdf->Cell(95,3,'C.I.No. 1099499 LP.', 0,1,'C');
     $pdf->Cell(95,3,'JEFE ADMINISTRATIVO', 0,0,'C',0);
     $pdf->Cell(95,3,'DIRECTOR', 0,1,'C',0);
     $pdf->Cell(95,3,'ANAPOL', 0,0,'C',0);
     $pdf->Cell(95,3,'ACADEMIA NACIONAL DE POLICIAS', 0,1,'C',0);
     



 $pdf->Output();       //para mostrar el pdf

    }
}

?>
