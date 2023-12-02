<script>
    function deleteCitizen(_this) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Esta seguro?',
            text: " Usted se dispone a aliminar los datos de un  ciudadano!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#00a6d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Desea elminar la datos del ciudadano ?'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = "id=" + _this.id.split('rc')[1];

               // alert(id);
                $.ajax({
                    data: id,
                    url: '{{ route('deleteCitizen') }}',
                    type: 'post',
                    beforeSend: function() {
                        $('#loadPageM').show();
                    },
                    complete: function() {
                        $('#loadPageM').hide();
                    },
                    success: function(response) {
                        console.log("respuest:." + response);

                        if (response == null) {
                            $("#rc_" + _this.id.split('rc')[1]).css("opacity", "0.9").fadeTo(0, 0.1)
                                .fadeTo(1000, 1);
                            $("#rc_" + _this.id.split('rc')[1]).css("backgroundColor", "#f0ad4e");
                            $("#rc_" + _this.id.split('rc')[1]).css("color", "white");
                        } else {
                            $("#rc_" + _this.id.split('rc')[1]).css("opacity", "0.9").fadeTo(0, 0.1).fadeTo(1000, 1);
                            $("#rc_" + _this.id.split('rc')[1]).css("backgroundColor", "#fff");
                            $("#rc_" + _this.id.split('rc')[1]).css("borderColor", "#D8D8D8");
                            $("#rc_" + _this.id.split('rc')[1]).css("color", "#6E6E6E");
                            $("#rc_" + _this.id.split('rc')[1]).hide();
                        }
                    },
                    error: function(jqXHR) {
                        console.log('Error el intentar eliminar la tarea');
                    }
                });

                Swal.fire({
                    icon: 'success',
                    title: 'El ciudadano fue eliminado del sistema !',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    }
</script>
