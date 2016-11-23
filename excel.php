<?php
header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=$filename" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");
?>
<style type="text/css">
<!--
.style2 {color: #000000}
.style3 {font-size: 18px}
-->
</style>

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
