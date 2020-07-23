<?php

/* @var $this yii\web\View */

$this->title = 'APNDE PoltekSSN';
?>
<div class="site-index">

    <div class="jumbotron">
        <p class="lead">Selamat Datang</p>
        <h1>APNDE PoltekSSN</h1>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Semua Surat</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          
        </div>
        
        <div class="box-body">
          <div class="row">
                <div class="col-lg-4 col-xs-12">
                  
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?= $jmlSuratMasuk ?><sup style="font-size: 20px"> Surat</sup></h3>

                      <p>Surat Masuk</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    
                  </div>
                </div>
                
                <div class="col-lg-4 col-xs-12">
                  
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?= $sudahDisposisi ?><sup style="font-size: 20px"> Surat</sup></h3>

                      <p>Surat Masuk Sudah Disposisi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    
                  </div>
                </div>
                
                <div class="col-lg-4 col-xs-12">
                  
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?= $belumDisposisi ?> <sup style="font-size: 20px"> Surat</sup></h3>

                      <p>Surat Masuk Belum Disposisi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    
                  </div>
                </div>
                
              </div>
        </div>
        
      </div>
        </div>

    <div class="row">
        <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Saya</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          
        </div>
        
        <div class="box-body">
          <div class="row">
                <div class="col-lg-4 col-xs-12">
                  
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?= $suratMasukSaya ?><sup style="font-size: 20px"> Surat</sup></h3>

                      <p>Surat Masuk</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    
                  </div>
                </div>
                
                <div class="col-lg-4 col-xs-12">
                  
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?= $sudahSayaDisposisi ?><sup style="font-size: 20px"> Surat</sup></h3>

                      <p>Surat Masuk Sudah Disposisi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    
                  </div>
                </div>
                
                <div class="col-lg-4 col-xs-12">
                  
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?= $belumSayaDisposisi ?> <sup style="font-size: 20px"> Surat</sup></h3>

                      <p>Surat Masuk Belum Disposisi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    
                  </div>
                </div>
                
              </div>
        </div>
        
      </div>
    </div>
            

        <!-- <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div> -->

    </div>
</div>
