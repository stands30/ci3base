<div class="profile-usertitle">
                                                <?php
                                                                                   $src=NO_IMAGE;
                                                                                /*  if($prs_img=='')
                                                                                        {
                                                                                          $src=NO_IMAGE;
                                                                                          }
                                                                                          else{
                                                                                              $src=base_url().PERSON_IMAGE_PATH.$prs_img;

                                                                                          }
                                                                                            */  ?>
                                                    <img src="<?php echo $src?>" hiegth="80" width="120">
                                                    <div class="profile-usertitle-name">
                                                        <?php echo $cmp_name ?>
                                                    </div>
                                            </div>
                                            <div class="profile-usermenu">
                                                <ul class="nav">
                                                    <li class="active">
                                                        <a href="<?php echo site_url('company-details-'.$ref_encrypt)?>">
                                                            <i class="icon-home"></i> Profile
                                                        </a>
                                                    </li>
                                                     <li class="active">
                                                        <a href="<?php echo site_url('company-person-'.$ref_encrypt)?>">
                                                            <i class="icon-home"></i> Person
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>