jQuery(document).ready(function(){
  jQuery(".myBtn").click(function(){
      var id = jQuery(this).attr("value");
      jQuery("#id").val(id);
      var sdt = jQuery(".sdt[val='"+id+"']").text();
      jQuery("#sdt").val(sdt);
      var ten = jQuery(".ten[val='"+id+"']").text();
      jQuery("#ten").val(ten);
      var diachi = jQuery(".diachi[val='"+id+"']").text();
      jQuery("#diachi").val(diachi);
      var giatien = jQuery(".giatien[val='"+id+"']").text().replace(/\D/g,'');
      jQuery("#giatien").val(giatien);
      if (jQuery(".vip[val='"+id+"']").attr("vip") == 1) {
        jQuery("#vip").attr('checked', true);
      } else {
        jQuery("#vip").attr('checked', false);
      };

      jQuery("#myModal").modal();
      return false;
  });

  jQuery("#addCustomer").click(function(){
    jQuery("#myModal2").modal();
  });

  jQuery(".active").click(function(){
      var active;
      var id =  jQuery(this).attr("value");
      if (jQuery(this).find("i").hasClass("glyphicon-play")) {
        jQuery(this).find("i").addClass("glyphicon-pause").removeClass("glyphicon-play");
        active = 1;
      } else {
        jQuery(this).find("i").addClass("glyphicon-play").removeClass("glyphicon-pause");
        active = 0;
      };

      jQuery.ajax({
        url: "activeUser.php",
        data: {
          "active" : active,
          "id" : id
        },
        success: function(result){
          alert(result);
        }
      });

  });

});
