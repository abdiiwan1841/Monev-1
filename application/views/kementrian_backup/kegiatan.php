			<table>
				<tr>
					<td valign="top">Satuan Kerja</td>
					<td valign="top"> : </td>
					<td width="500"><?php echo $nmsatker;?></td>
				</tr>			
				<tr>
					<td valign="top">Unit / Eselon I </td>
					<td valign="top"> : </td>
					<td><?php echo $nmunit;?></td>
				</tr>
				<tr>
					<td valign="top">Kementrian / Lembaga</td>
					<td valign="top"> : </td>
					<td><?php echo $nmdept;?></td>
				</tr>
				<tr>
					<td valign="top">Program</td>
					<td valign="top"> : </td>
					<td><?php echo strtoupper($program);?></td>
				</tr>
			</table>			
                        <!--
			<div id="search-box">
				<p>20 laporan masih bermasalah</p>
				<div id="search">
					<img src="http://localhost/monev/assets/img/magnifier.png"/>
					<input type="text"/>
				</div>
			</div>
                        -->
			<div id="nav-box">
                            <!--
				<p id="total">Total 35 laporan dalam 7 halaman.</p>
				<div id="pagination">
					<div id="page-top"><a href="#"><img src="http://localhost/monev/assets/img/top.png"/></a></div>
					<div id="page-prev"><a href="#"><img src="http://localhost/monev/assets/img/prev.png"/></a></div>
					<div class="number"><a href="#">3</a></div>
					<div class="number"><a href="#">4</a></div>
					<div class="number active"><a href="#">5</a></div>
					<div class="number"><a href="#">6</a></div>
					<div class="number"><a href="#">7</a></div>
					<div id="page-prev"><a href="#"><img src="http://localhost/monev/assets/img/next.png"/></a></div>
					<div id="page-end"><a href="#"><img src="http://localhost/monev/assets/img/end.png"/></a></div>
				</div>
				<div class="clearfix"></div>
				-->
				<div id="box-title">
					<div class="column1">Daftar Kegiatan</div>
					<div class="clearfix"></div>
				</div>
				<?php
                                foreach ($kegiatan as $kegiatan_item):
                                ?>
				<div class="box-content">
					<div class="box-content-left">
					<h3 style="width:400px;"><?php echo $kegiatan_item['nmgiat'];?></h3>									
					</div><!-- end of box-content-left -->

					<div class="box-content-right">
					<table>
						<tr>
							<td class="button"><a href="<?php echo base_url();?>kementrian/realisasi/<?php echo $kegiatan_item['kddept'];?>-<?php echo $kegiatan_item['kdunit'];?>-<?php echo $kegiatan_item['kdsatker'];?>-<?php echo $kegiatan_item['kdprogram'];?>-<?php echo $kegiatan_item['kdgiat'];?>" class="custom">Pengesahan Realisasi</a></td>
							<td class="mark">
								<!--<img src="http://localhost/monev/assets/img/new.png" class="round-mark"/>-->
							</td>
						</tr>
					</table>
					</div><!-- end of box-content-right -->
					
					<div class="clearfix"></div>
				</div><!-- end of box-content -->
				<?php endforeach ?>
			</div>