<?php
include "lib/corelib.php";
ob_start();
?>
<style type="text/css">
<!--
.style2 {color: #000000}
.style3 {font-size: 18px}
-->
 table.page_footer {width: 100%; border: none; background-color: LightBlue; border-top: solid 1mm SteelBlue; padding: 2mm}
    table.page_header {width: 100%; border: none; background-color: LightBlue; border-bottom: solid 1mm SteelBlue; padding: 2mm }
</style>

<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 33%; text-align: left;">Tabin, c.a. 
                    
                </td>
                <td style="width: 34%; text-align: center">&nbsp;
                    
                </td>
                <td style="width: 33%; text-align: right">&nbsp;
                    
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    Cliente GUSTAVO PDF
                </td>
                <td style="width: 34%; text-align: center">
                    page [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 33%; text-align: right">
                    0424-3755128</td>
            </tr>
        </table>
    </page_footer>

<table style="border:1px solid red">
            <thead>
              <tr bgcolor="#0099FF">
                <th width="8">#</th>
                <th width="94">First Name</th>
                <th width="207">Last Name</th>
                <th width="248">Username</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr bgcolor="#FFFF00">
                <td><span class="style2">2</span></td>
                <td><span class="style2">Jacob</span></td>
                <td><span class="style2">Thornton</span></td>
                <td><span class="style2">@fat</span></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
              <tr bgcolor="#66FF66">
                <td>4</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr class="style2">
                <td><span class="style3">5</span></td>
                <td><span class="style3">Jacob</span></td>
                <td><span class="style3">Thornton</span></td>
                <td><span class="style3">@fat</span></td>
              </tr>
              <tr>
                <td>6</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
</page>

<?php
$content = ob_get_clean();
ob_end_clean();
require_once('lib/html2pdf/html2pdf.class.php');
try {
    $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
    $html2pdf->pdf->SetDisplayMode('real');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('Comprobante_PDF.pdf');
}
catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>