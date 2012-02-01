 $(document).ready(function () {
								 var base_url= $(location).attr('href');
								 var site_url = base_url.replace("/admin", "/");
                $("#list1").jqGrid({
										url: site_url+"/loadDataGrid",     //another controller function for generating data
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
	                    autowidth: true,diting
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
