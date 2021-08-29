<!-- Content Start -->
<div class="main-content">
	<div class="main-content-inner">

		<!-- Trending Videos Start -->
		<div class="section">


			<div class="swiper-container multi-row-videos">
				<div class="video-slider swiper-wrapper">
                    <?php
                    for ($i = 0; $i < count($videos); $i ++) {
                        $this->CI = & get_instance();
                        $this->CI->load->database();
                        $this->CI->load->model('Channel_model');
                        $channel = $this->CI->Channel_model->get_channel($videos[$i]['channel_id']);
                        ?>
					<!-- Video Start -->
					<div class="swiper-slide">
						<div class="video">
							<div class="video-thumbnail">
								<div class="video-thumbnail-inner">
									<a
										href="<?php echo site_url('details/index/'.$videos[$i]['id']); ?>"><img
										src="<?php echo base_url().'public/'.$videos[$i]['file_poster']?>"
										alt="video"></a> <a href="#"
										class="video-control watch-later-btn" data-toggle="tooltip"
										title="Watch Later"> <i class="fas fa-stopwatch"></i>
									</a> <a
										href="<?php echo site_url('details/index/'.$videos[$i]['id']); ?>"
										class="play-btn"> <i class="fas fa-play"></i>
									</a>
								</div>
							</div>
							<div class="video-content">
								<div class="media">
									<div class="media-body">
										<h6>
											<a
												href="<?php echo site_url('details/index/'.$videos[$i]['id']); ?>"><?php echo $videos[$i]['video_title'];?></a>
										</h6>
										<a class="video-author"
											href="<?php echo site_url('channel/index/'.$videos[$i]['channel_id']); ?>"><i
											class="fas fa-check-double"></i><?=$channel['channel_name']?></a>
										<div class="video-meta">
											<span><?php
                        $this->CI = & get_instance();
                        echo $this->CI->get_count_views($videos[$i]['id']);
                        ?> viewers</span> <span><?php
                        echo date("M d Y", strtotime($videos[$i]['created_at']));
                        ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Video End -->
                     <?php
                    }
                    ?> 
				
				</div>

			</div>

		</div>
		<!-- Trending Videos End -->

		<!--Pagination-->
		<?php
echo $link;
?>
        <!--End of Pagination//-->

	</div>

</div>
<!-- Content End -->

