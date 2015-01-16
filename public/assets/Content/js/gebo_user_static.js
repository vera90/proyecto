/* [ ---- Gebo Admin Panel - user profile (static) ---- ] */

	$(document).ready(function() {
		$('.item-list-show').click(function(e) {
			var items = $(this).data('items');
			var hiddenItems = $(this).prev('.item-list').find('.item-list-more').filter(':hidden');
			hiddenItems.each( function(i) {
				if( i < items ) {
					$(this).show();
				}
			});
			e.preventDefault();
			if(hiddenItems.length <= items) {
				$(this).hide();
			};
		});
		gebo_notifications.smoke_js();
	});


 gebo_notifications = {
		smoke_js: function() {
			$('#refund_complete_confirm').click(function(e){
                tstconfirm();
				e.preventDefault();
            });

            $('#refund_confirm').click(function(e){
                tstconfirm2();
				e.preventDefault();
            });

             $('#resendCoupons').click(function(e){
                tstconfirm3();
				e.preventDefault();
            });

              $('#resendPayment').click(function(e){
                tstconfirm4();
				e.preventDefault();
            });
              $('#aplyChanges').click(function(e){
                tstconfirm5();
				e.preventDefault();
            });
              $('#resendAllCoupon').click(function(e){
                tstconfirm6();
				e.preventDefault();
            });
              			
			
			function tstconfirm(){
				smoke.confirm('Estas seguro de reembolsar toda la orden?',function(e){
					if (e){
						$('#refund_complete').modal('toggle');
					}
				}, {ok:"Reembolsar", cancel:"Cancelar"});
			}

			function tstconfirm2(){
				smoke.confirm('Estas seguro de reembolsar este detalle?',function(e){
					if (e){
						$('#refund').modal('toggle');
					}
				}, {ok:"Reembolsar", cancel:"Cancelar"});
			}

			function tstconfirm3(){
				smoke.alert('Cupones Reenviados!',{ok:"Aceptar"});
			}

			function tstconfirm4(){
				smoke.alert('Ficha de Pago Reenviada!',{ok:"Aceptar"});
			}

			function tstconfirm5(){
				$('#cambioTalla').modal('hide')
				smoke.alert('Los cambios se han realizado correctamente!',{ok:"Aceptar"});
			}

			function tstconfirm6(){
				$('#ListCupones').modal('hide')
				smoke.alert('Los Cupones se han reenviado correctamente!',{ok:"Aceptar"});
			}
			
					
			
		}
    };

