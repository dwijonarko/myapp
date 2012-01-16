<!DOCTYPE html>
<html >
    <head>
        <link rel="stylesheet" href="<?php echo base_url()?>stylesheets/jquery-ui-1.8.16.custom.css" type="text/css" media="all" />
        <link type="text/css" href="<?php echo base_url()?>stylesheets/ui.jqgrid.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url()?>stylesheets/jquery.searchFilter.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url() ?>stylesheets/css.css" type="text/css"  media="screen" /></link>
				<script src="<?php echo base_url() ?>javascripts/jquery.min.js" type="text/javascript"></script>
				<script src="<?php echo base_url() ?>javascripts/jquery-ui.min.js" type="text/javascript"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jqgrid/js/i18n/grid.locale-en.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jqgrid/jquery.jqGrid.min.js"></script>
        <title>Daftar Calon Mahasiswa Baru - Politeknik Kota Malang</title>
    </head>
    <body>
        <?php
            $ci =& get_instance();
            $base_url = base_url();
        ?>

        <script type="text/javascript">
              $(document).ready(function () {
                $("#list1").jqGrid({
                   url:'<?php echo $base_url.'index.php/pmb/admin/loadDataGrid'?>',     //another controller function for generating data
                    mtype : "POST",             //Ajax request type. It also could be GET
                    datatype: "json",            //supported formats XML, JSON or Arrray
                    colNames:["No Pendaftaran","Nama Lengkap","No Telp","Pilihan 1","Asal Sekolah"],       //Grid column headings
                    colModel:[
                        {name:"no_pendaftaran",index:"no_pendaftaran", width:20, align:"left"},
                        {name:"nama_lengkap",index:"nama_lengkap", width:20, align:"left"},
                        {name:"no_telp",index:"no_telp", width:20, align:"left"},
                        {name:"pilihan_1",index:"pilihan_1", width:20, align:"left"},
                        {name:"asal_sekolah",index:"asal_sekolah", width:20, align:"left"}
                    ],
                    rownumbers:true,
                    rowNum:10,
                    width: 900,
                    height: "auto",
                    rowList:[10,20,30],
                    pager:"#pager1",
                    sortname: "id",
                    viewrecords: true,
                    rownumbers: true,
                    gridview: true,
                    caption:"Daftar Calon Mahasiswa Baru Politeknik Kota Malang"
                }).navGrid("#pager1",{edit:false,add:false,del:false});
            });
        </script>
				<div id="menu"><?php echo anchor('auth/logout','Logout') ?></div>
				<div id="content">

	        <table id="list1"></table> <!--Grid table-->
	        <div id="pager1"></div>  <!--pagination div-->
        </div>
    </body>
</html>