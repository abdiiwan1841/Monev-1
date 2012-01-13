            <h1><?php echo(isset($title))?$title:'Dashboard Eselon';?></h1>
			<div id="search-box" style="min-height:400px;">
				<div class="filter-option-box">
					<?php if((isset($kddept) && $kddept != 0) && (isset($kdunit) && $kdunit != 0)): ?>				
					<form name="form3" action="<?php echo site_url('eselon');?>" method="POST">
						<input type="hidden" name="kddept" value="<?php echo $kddept;?>"/>
						<input type="hidden" name="kdunit" value="<?php echo $kdunit;?>"/>
						<select name="kdprogram" onchange="this.form.submit();" class="chzn-select" data-placeholder="PILIH PROGRAM" tabindex="3">
							<option value="0" selected="selected">Semua Program</option>
							<?php
							foreach ($program as $item):
								if($kdprogram == $item['kdprogram']){ $selected = 'selected';} else { $selected = "";}
							?>
							<option value="<?php echo $item['kdprogram'];?>" <?php echo $selected;?>>
							<?php echo $item['kdprogram'];?> -- <?php echo $item['nmprogram'];?>
							</option>				
						<?php endforeach ?>
						</select>					
					</form>
					<?php endif; ?>
					<span class="form-tampilkan">
					<form name="form4" action="<?php echo site_url('eselon');?>" method="POST">
						<?php if(isset($kddept)) { ?><input type="hidden" name="kddept" value="<?php echo $kddept;?>"/><?php } ?>
						<?php if(isset($kdunit)) { ?><input type="hidden" name="kdunit" value="<?php echo $kdunit;?>"/><?php } ?>
						<?php if(isset($kdprogram)) { ?><input type="hidden" name="kdprogram" value="<?php echo $kdprogram;?>"/><?php } ?>
						<input type="submit" name="submit-pk" value="Tampilkan" class="custom" />					
					</form>
					</span>
				</div>
				
				<h3 class="header-graph">Grafik Penyerapan Anggaran</h3>
				<table class="chart-line accessHide" >
					<caption>Grafik Penyerapan Anggaran</caption>
					<thead>
						<tr>
							<td></td>
							<th scope="col">Jan</th>
							<th scope="col">Feb</th>
							<th scope="col">Mar</th>
							<th scope="col">Apr</th>
							<th scope="col">Mei</th>
							<th scope="col">Jun</th>
							<th scope="col">Jul</th>
							<th scope="col">Agu</th>
							<th scope="col">Sep</th>
							<th scope="col">Okt</th>
							<th scope="col">Nov</th>
							<th scope="col">Des</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Rencana Penarikan Anggaran(Juta)</th>
							<?php for($i=1;$i<=12;$i++):
								($i<10) ? $bulan='0'.$i : $bulan=$i;
								$rpd = get_konsistensi_perbulan('2011',$bulan,$kddept,$kdunit,$kdprogram);
							?>
							<td><?php echo ($rpd) ? substr($rpd->rpd, 0, -6) : '0';?></td>
							<?php endfor;?>
						</tr>
						<tr>
							<th scope="row">Realisasi Anggaran(Juta)</th>
							<?php for($i=1;$i<=12;$i++):
								($i<10) ? $bulan='0'.$i : $bulan=$i;
								$realisasi = get_konsistensi_perbulan('2011',$bulan,$kddept,$kdunit,$kdprogram);
							?>
							<td><?php echo ($realisasi) ? substr($realisasi->realisasi, 0, -6) : '0';?></td>
							<?php endfor;?>
						</tr>
					</tbody>
				</table>
				<br>
				<h3 class="header-graph">Grafik Indikator Kerja</h3>
				<table class="chart-bar accessHide" >
					<caption>Grafik Indikator Kerja</caption>
					<thead>
						<tr>
							<td></td>
							<th scope="col">Penyerapan</th>
							<th scope="col">Konsistensi</th>
							<th scope="col">Keluaran</th>
							<th scope="col">Efisiensi</th>
							<th scope="col">Manfaat</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Bobot Total</th>
							<td>9.7</td>
							<td>18.2</td>
							<td>43.5</td>
							<td>28.6</td>
							<td>0</td>
						</tr>
						<tr>
							<th scope="row">Pencapaian</th>
							<td><?php echo round($penyerapan->p/100*9.7,2);?></td>
							<td><?php echo round($konsistensi->k/100*18.2,2);?></td>
							<td><?php echo round($keluaran->pk/100*43.5,2);?></td>
							<td><?php echo round($efisiensi->e/100*28.6,2);?></td>
							<td>0</td>
						</tr>		
					</tbody>
				</table>
			</div>
			<div id="nav-box">
				
				
				
			</div>