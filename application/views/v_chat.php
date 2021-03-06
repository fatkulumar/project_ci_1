            <div class="row">
              <div class="col-md-12">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">3</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                              data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div id="append_chat" class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      <?php foreach($chat as $chating): ?>
                      <div class="direct-chat-msg <?php if($chating->posisi == 1){echo 'right';} ?>">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name <?php if($chating->posisi == 1){echo 'float-right';}else{echo 'float-left';} ?>"><?= $chating->username ?></span>
                          <span class="direct-chat-timestamp <?php if($chating->posisi == 1){echo 'float-left';}else{echo 'float-right';} ?>"><?= $chating->waktu ?></span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          <?= $chating->pesan ?>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <?php endforeach ?>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <!-- <?php foreach($chatBales as $bales): ?>
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right"><?= $bales->nama_karyawan ?></span>
                          <span class="direct-chat-timestamp float-left"><?= $bales->waktu ?></span>
                        </div> -->
                        <!-- /.direct-chat-infos -->
                        <!-- <img class="direct-chat-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user3-128x128.jpg" alt="message user image"> -->
                        <!-- /.direct-chat-img -->
                        <!-- <div class="direct-chat-text">
                          <?= $bales->pesan ?>
                        </div> -->
                        <!-- /.direct-chat-text -->
                      <!-- </div> -->
                      <!-- /.direct-chat-msg -->
                      <!-- <?php endforeach ?> -->

                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Alexander Pierce</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Working with AdminLTE on a great new app! Wanna join?
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Sarah Bullock</span>
                          <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user3-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          I would love to.
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                      <ul class="contacts-list">
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user1-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Count Dracula
                                <small class="contacts-list-date float-right">2/28/2015</small>
                              </span>
                              <span class="contacts-list-msg">How have you been? I was...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user7-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Sarah Doe
                                <small class="contacts-list-date float-right">2/23/2015</small>
                              </span>
                              <span class="contacts-list-msg">I will be waiting for...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user3-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nadia Jolie
                                <small class="contacts-list-date float-right">2/20/2015</small>
                              </span>
                              <span class="contacts-list-msg">I'll call you back at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user5-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nora S. Vans
                                <small class="contacts-list-date float-right">2/10/2015</small>
                              </span>
                              <span class="contacts-list-msg">Where is your new...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user6-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                John K.
                                <small class="contacts-list-date float-right">1/27/2015</small>
                              </span>
                              <span class="contacts-list-msg">Can I take a look at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="<?= base_url() ?>/assets/adminlte/dist/img/user8-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Kenneth M.
                                <small class="contacts-list-date float-right">1/4/2015</small>
                              </span>
                              <span class="contacts-list-msg">Never mind I found...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                      </ul>
                      <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <?php
                    $id_login = $this->session->userdata('id_login');
                    foreach ($id_login as $id) {
                      $idku = $id->id_registrasi;
                    }
                  ?> 
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form id="form_chat" action="#" method="post">
                      <div class="input-group">
                        <input id="waktu" type="text" value="<?= date('d-F-Y h:i:sa') ?>">
                        <input id="idku" type="text" value="<?= $idku ?>">
                        <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning" id="send">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <!-- <div class="col-md-6"> -->
                <!-- USERS LIST -->
                <!-- <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">8 New Members</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div> -->
                  <!-- /.card-header -->
                  <!-- <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user1-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                      </li>
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user8-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date">Yesterday</span>
                      </li>
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user7-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Jane</a>
                        <span class="users-list-date">12 Jan</span>
                      </li>
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user6-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">John</a>
                        <span class="users-list-date">12 Jan</span>
                      </li>
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user2-160x160.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Alexander</a>
                        <span class="users-list-date">13 Jan</span>
                      </li>
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user5-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Sarah</a>
                        <span class="users-list-date">14 Jan</span>
                      </li>
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user4-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Nora</a>
                        <span class="users-list-date">15 Jan</span>
                      </li>
                      <li>
                        <img src="<?= base_url() ?>/assets/adminlte/dist/img/user3-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Nadia</a>
                        <span class="users-list-date">15 Jan</span>
                      </li>
                    </ul> -->
                    <!-- /.users-list -->
                  <!-- </div> -->
                  <!-- /.card-body -->
                  <!-- <div class="card-footer text-center">
                    <a href="javascript::">View All Users</a>
                  </div> -->
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <script>
              $(document).ready(function(){
                $('#send').click(function(){
                    var message = $('#message').val();
                    var waktu = $('#waktu').val();
                    var idku = $('#idku').val();
                        $.ajax({
                        type : 'POST',
                        url: '<?= base_url('admin/t_chat') ?>',
                        data: {
                          message : message,
                          waktu : waktu,
                          id_from_reg : idku
                        },
                        success : function(data){
                          console.log(data[0].pesan)
                          $('#message').html("")
                          $('#append_chat').append(`
                            lorem orererererer
                          `)
                            
                        }
                    })
                })
              })
            </script>