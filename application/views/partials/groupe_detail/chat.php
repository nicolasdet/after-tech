
                        <div class="col-lg-8 hidden  account-tab" id="detail-chat">
                            <input type="hidden" name="" id="salon_id" value="<?= $SalonChat->salon_id ?>">
                            <input type="hidden" name="" id="user_id"  value="<?= $user->user_id ?>">

                            <div class="conversation__head boxed boxed--lg bg--primary">
                                <h3 class="text-center">
                                    Espace de discution du groupe
                                 </h3>
                                <!--<span><?= date("d-m-Y");   ?></span>-->
                            </div>
                            
                            <div id="groupeChatZone">
                                 
                            <div class="conversation__reply boxed boxed--border" >
                                
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea id="chatText" rows="2" name="reply" placeholder="Type reply message here"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="sendMessage" class="btn width-100 mt-3">Envoyer le message</button>
                                        </div>
                                    </div>
                               
                            </div>
                            <div class="comments conversation__comments">
                                <div id="TitreZoneConversation"></div>
                                <ul class="comments__list" id="chatUl">
                                    <!--
                                    <li>
                                        <div class="comment">
                                            <div class="comment__avatar">
                                                <img alt="Image" src="public/assets/img/avatar-round-1.png" />
                                            </div>
                                            <div class="comment__body">
                                                <h5 class="type--fine-print">Anne Brady</h5>
                                                <div class="comment__meta">
                                                    <span>14th March 2017, 1:08pm</span>
                                                </div>
                                                <p>
                                                    Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                                </p>
                                            </div>
                                        </div>
                                      
                                    </li>
                                -->
                                </ul>
                            </div>
                            </div>

                            
                            <div class="bgWheat boxed boxed--border" id="loadingChatZone">
                                    <h4 id="titleLoader"> Chargement du Salon...</h4>
                                    <div id="customLoader" class="customLoader"></div>
                            </div>
                            <!--end comments-->
                        </div>