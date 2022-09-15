@extends("base")
@section("content")
<!-- Main content -->
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"> Schemes <small>Dashboard</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>1018+</h3>
                <p>MCF</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>177+</h3>
                <p>RRF</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>1010+</h3>
                <p>HKS</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>4085+</h3>
                <p>C@S</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="21" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.7pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>District-wise status of target vs achievement of functioning HKS, MCF and RRF</span></strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:32.1pt;"><br></td>
                    <td rowspan="2" style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:32.1pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Sl No.</span></strong></p>
                    </td>
                    <td rowspan="2" style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:32.1pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>District</span></strong></p>
                    </td>
                    <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 32.1pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Target</span></strong></p>
                    </td>
                    <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 32.1pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>June</span></strong></p>
                    </td>
                    <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 32.1pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>July</span></strong></p>
                    </td>
                    <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 32.1pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>August</span></strong></p>
                    </td>
                    <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 32.1pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Shortfall</span></strong></p>
                    </td>
                    <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 32.1pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>% of achievement</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 32.1pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>November</span></strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:67.65pt;"><br></td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>HKS (No. of LSGIs)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>MCF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>RRF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>HKS (No. of LSGIs)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>MCF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>RRF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>HKS (No. of LSGIs)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>MCF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>RRF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>HKS (No. of LSGIs)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>MCF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>RRF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>HKS (No. of LSGIs)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>MCF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>RRF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>HKS (No. of LSGIs)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>MCF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>RRF (in No.s)</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:67.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Mini MCF</span></strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid windowtext 1.0pt;background:#DADFE8;padding:0cm 0cm 0cm 0cm;height:  2.6pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Thiruvananthapuram</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>78</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>91</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>19</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>80</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>82</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>78</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>86</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94.51</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>57.89</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>93</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Kollam</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>73</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>86</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>19</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>73</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>79</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>73</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>79</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>73</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>79</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>91.86</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>84.21</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>198</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Pathanamthitta</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>57</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>61</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>12</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>57</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>58</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>57</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>58</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>57</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>58</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>95.08</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>91.67</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>765</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Alappuzha</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>78</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>84</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>18</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>76</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>88</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>74</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>76</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>98.72</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>90.48</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>72.22</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>123</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Kottayam</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>83</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>17</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>77</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>97.59</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94.12</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>47</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Idukki</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>54</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>56</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>10</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>52</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>55</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>52</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>55</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>54</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>55</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>98.21</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>70.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>194</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Ernakulam</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>96</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>115</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>31</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>76</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>82</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>95</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>109</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>22</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>98.96</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94.78</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>70.97</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>438</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Thrissur</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>106</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>27</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>83</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>91</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>29</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>87</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>91</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>31</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>92</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>31</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>14</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>-4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>86.79</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>114.81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>420</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Palakkad</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>95</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>102</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>20</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>95</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>15</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>95</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>15</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>95</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>15</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>98.95</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>93.14</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>75.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>21</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>10</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Malappuram</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>106</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>118</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>27</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>96</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>98</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>96</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>98</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>96</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>22</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>23</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>92.45</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81.36</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>14.81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>146</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Kozhikode</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>78</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>92</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>23</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>78</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>59</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>78</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>59</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>78</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>62</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>30</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>67.39</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>30.43</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>327</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Wayanad</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>26</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>29</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>7</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>25</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>27</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>25</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>27</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>25</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>27</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>96.15</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>93.10</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>57.14</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>206</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Kannur</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>95</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>24</span></strong></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>85</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>19</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>85</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>20</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>84</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>20</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>88.42</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>83.33</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>670</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>14</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Kasargode</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>41</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>44</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>10</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>41</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>37</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>41</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>37</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: lime;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>41</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: yellow;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>40</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: rgb(224, 102, 102);padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>90.91</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>60.00</span></p>
                    </td>
                    <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>539</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:37.3pt;"><br></td>
                    <td colspan="2" style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>Total</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1034</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1162</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>264</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>984</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1013</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>174</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1011</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1019</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>177</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1022</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>1040</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>183</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>12</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>122</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>81</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>98.84</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>89.50</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>69.32</span></strong></p>
                    </td>
                    <td style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:37.3pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Arial",sans-serif;color:black;'>4187</span></strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection