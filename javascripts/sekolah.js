$(document).ready(function () {
              var base_url= $(location).attr('href');
              var grid = $("#list1");
              function createGrid(){
	              grid.jqGrid({
	                   url: base_url+"/loadDataGrid",     //another controller function for generating data
	                    mtype : "POST",             //Ajax request type. It also could be GET
	                    datatype: "json",            //supported formats XML, JSON or Arrray
	                    colNames:["NPSN","NSS","Nama","Jenjang","Status","Kota","Kecamatan","Desa","Alamat","NIP Kepala Sekolah","Nama Kepala Sekolah","Status","Keterangan"],       //Grid column headings
	                    colModel:[
	                        {name:"npsn",index:"npsn", width:20, align:"left"},
	                        {name:"nss",index:"nss", width:30, align:"left"},
	                        {name:"nama",index:"nama", width:50, align:"left"},
	                        {name:"jenjang",index:"jenjang", width:45, align:"left"},
	                        {name:"status",index:"status", width:30, align:"left"},
	                        {name:"kota",index:"kota", width:20, align:"left"},
	                        {name:"kecamatan",index:"kecamatan", width:20, align:"left"},
	                        {name:"desa",index:"desa", width:20, align:"left"},
	                        {name:"alamat",index:"alamat", width:40, align:"left"},
	                        {name:"nip_ks",index:"nip_ks", width:25, align:"left"},
	                        {name:"nama_ks",index:"nama_ks", width:40, align:"left"},
	                        {name:"update_status",index:"update_status", width:20, align:"left"},
	                        {name:"keterangan",index:"keterangan", width:20, align:"left"}
	                    ],
	                    rownumbers:true,
	                    rowNum:50,
	                    shrinkToFit:true,
	                    scrolling: true,
	                    autowidth: true,
	                    height: "auto",
	                    rowList:[50,100,150,],
	                    pager:"#pager1",
	                    sortname: "id",
	                    viewrecords: true,
	                    rownumbers: true,
	                    gridview: true,
	                    multiselect: true,
			                loadComplete: function() {
			                var row =  grid.getGridParam("records");
				              $('.jqgrow').each(function(index,value){
					              var idRow = $(this).attr("id");
												var data = jQuery('#list1').jqGrid ('getCell', idRow, 'keterangan');
							                if(data==="dikunjungi"){
								                grid.jqGrid('setRowData',idRow,"false",'ui-state-error');
							                }
				              });
	                    },
											caption:"Daftar SMA / SMK se-Jawa Timur"
	                }).navGrid("#pager1",
	                {edit:false,add:false,del:false},
	                {}, {}, {},
	                {multipleSearch:true}
	                );
              }
	              createGrid();
                $("#m1").click( function() {
		                var s;
		                s = $("#list1").jqGrid('getGridParam','selarrrow').toString();
		                var id = s.split(',');
										 var form_data={param:s};
										 $.ajax({
												url : base_url+"/submit",
												type : 'POST',
												data : form_data,
												success: function(msg){
													alert("data sudah di update");
													 $("#list1").trigger("reloadGrid");
												}
										});
		            });
            });