			<h1><?php echo $nmgiat;?></h1>
			<div id="search-box">
				<?php if($this->session->flashdata('message')):?>
				<div class="alert-message <?php echo $this->session->flashdata('message_type')?> no-margin-bottom" data-alert="alert">
						<a class="close" href="#">&times;</a>
						<p><?php echo $this->session->flashdata('message')?></p>
				</div>
				<?php endif;?>
			</div>
			<div id="nav-box">
				<div class="clearfix"></div>
				
				<div id="box-title">
					<div class="column6">Capaian Keluaran</div>
					<div class="column2 borderright borderleft">Target</div>
					<div class="column5">Realisasi</div>
					<div class="clearfix"></div>
				</div><!-- end of box-title -->
				<?php echo form_open('satker/do_real_output');?>
				
				<input type="hidden" name="kdprogram" value="<?php echo $kdprogram;?>"/>				
				<input type="hidden" name="kdgiat" value="<?php echo $kdgiat;?>"/>
				
				<?php
				$i = 1;
				$notif = "";
				foreach($output as $row):
				?>
				<!-- data kdoutput, tvk, dan satuan -->
				<input type="hidden" name="kdoutput_<?php echo $i;?>" value="<?php echo $row['kdoutput'];?>"/>
				<input type="hidden" name="tvk_<?php echo $i;?>" value="<?php echo $row['vol'];?>"/>
				<input type="hidden" name="sat_<?php echo $i;?>" value="<?php if(isset($row['sat'])) echo $row['sat'];?>"/>				

				
				
				<div class="box-normal box-end">					
					<div class="column6"><?php echo $row['nmoutput'].' ('.$row['sat'].')';?></div>
					<div class="column2"><?php echo $row['vol'];?></div>
					<div class="column5">
						<!-- data rvk -->
						<?php
						$rvk = "";
						$disabled = "";
						if(isset($row['rvk'])){
							$rvk = $row['rvk'];							
							if($row['accsatker'] == 1){ $disabled = 'disabled';}
						}
						?>						
						<input type="text" name="rvk_<?php echo $i;?>" class="realisasi" value="<?php echo $rvk;?>" <?php echo $disabled;?>/>	
						
					</div>
					<div class="clearfix"></div>
				</div><!-- end of box-content -->
				
				<div class="box-subset-title">IKK <?php echo $row['nmoutput'];?> :</div>
				
				<?php foreach($ikk as $row1):?>
				<div class="box-content box-list">
					<div class="column6"><div class="subset"><?php echo $row1['nmikk'];?></div></div>
					<div class="column2"><div class="subset"></div></div>
					<div class="column5"></div>
					<div class="clearfix"></div>
				</div><!-- end of box-content -->
				
				<?php endforeach; // end of ikk foreach
				$i++;
				endforeach; // end of output foreach
				$n = $i-1;	
				?>
				<input type="hidden" name="n" value="<?php echo $n;?>"/>
				
				<?php
				if($row['accsatker'] == 1)
				{
					if($row['accunit'] == 0)
					{
						$message = "Data dalam proses Eselon I";
					}
					elseif($row['accunit'] == 1 && $row['accdept'] == 0)
					{
						$message = "Data dalam proses Kementerian";	
					}
				?>
				<div style="margin-top:20px;margin-bottom:0;" class="alert-message <?php echo $this->session->flashdata('message_type')?> no-margin-bottom" data-alert="alert">
					<a class="close" href="#">&times;</a>
					<p><?php echo $message;?></p>
				</div>	
				<?php
				} else {
				?>
				<!--<input type="submit" name="submit" value="Proses" id="incomplete" class="blackbg"/>-->
				<input type="submit" name="submit" value="Proses" class="blackbg"/>
				<input type="submit" name="submit" value="Simpan" class="blackbg"/>
				<?php } ?>
				</form>
				<br/>
				<!--
				<div class="box-subset-title">Catatan Satker : </div>
				<div class="box-content box-end">
					<textarea id="comment"></textarea>
				</div>
				-->
				<script src="<?php echo ASSETS_DIR_JS.'jquery.autoresize.js'?>"></script>
				<script>

				$('textarea,input').autoResize({
					onBeforeResize: function(){
					console.log('Before');
					},
					onAfterResize: function(){
					console.log('After');
				}
				});		
				</script>
				
				
				<div class="clearfix"></div>				
			</div>