<script type="text/javascript">
    $(document).on('change', '#searchTask', function(event) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            dataType: 'json',
            url: "{{ route('search') }}",
            data: {
                'searchTask': $('#searchTask').val(),
            },
            beforeSend: function() {
                $('#loadPageM').show();
            },
            complete: function() {
                $('#loadPageM').hide();
            },
            success: function(response) {
                console.log(response);
                var out = "";
                out += "<hr>";
                for (let i = 0; i < response.length; i++) {
                    if (response[i].id == null || typeof response[i].id == "undefined" ||
                        response == "null") {
                        out += "<div class='form-group row' style='margin: 10px;''>";
                        out += "<div class='col-sm-5 mb-3 mb-sm-0 ''>";
                        out += "<h5>NO HAY TARÉAS ASIGNADAS PARA EL DIA.</h5><div><div>";
                        break;
                    } else {
                        out +=
                            "<div class='table-responsive'><table class='table table-bordered' id='ed_" +
                            response[i].id + "' width='100% !important' cellspacing='0'>";
                        out +=
                            "<thead style='background-color: #4e73df; color:white;'><tr><th style='width:25%''> Datos de asignaciones </th><th>&nbsp;&nbsp;<i class='fas fa-trash'></i></th><th>Fecha de creación</th></tr></thead>";
                        out += "<tbody>";
                        out += " <tr><td style='width: 70%'>";
                        out += "<b> <u>" + response[i].day + "</u></b> <br>";
                        out += "<b> Taréa    :</b> " + response[i].task + "<br>";
                        out += "<b> Nombre   :</b> " + response[i].name + "<br>";
                        out += "<b> Teléfono :</b> " + response[i].phone + "<br>";
                        out += "<b> Email    :</b> " + response[i].email + " <br></td>";
                        out += "<td><button class='btn btn-danger btn-sm' id='ed" + response[i].id +
                            "' onclick='deleteTask(this)'><i class='fas fa-trash'></i></button></td>";
                        out += "<td>" + response[i].created_at + " </td></tr>";
                        out += "</tbody></table><div>";
                    }
                }
                $(".output").html(out);
            },
            error: function(jqXHR) {
                console.log('Error el intentar realizar la busqueda');

            }
        });

    });

    function deleteTask(_this) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Esta seguro?',
            text: " Usted se dispone a aliminar una de las tareas de un ciudadano!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#00a6d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Desea elminar la tarea ?'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = "id=" + _this.id.split('ed')[1];
                $.ajax({
                    data: id,
                    url: '{{ route('deleteTask') }}',
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
                            $("#ed_" + _this.id.split('ed')[1]).css("opacity", "0.9").fadeTo(0, 0.1)
                                .fadeTo(1000, 1);
                            $("#ed_" + _this.id.split('ed')[1]).css("backgroundColor", "#f0ad4e");

                            $("#ed_" + _this.id.split('ed')[1]).css("color", "white");
                        } else {
                            $("#ed_" + _this.id.split('ed')[1]).css("opacity", "0.9").fadeTo(0, 0.1)
                                .fadeTo(1000, 1);
                            $("#ed_" + _this.id.split('ed')[1]).css("backgroundColor", "#fff");
                            $("#ed_" + _this.id.split('ed')[1]).css("borderColor", "#D8D8D8");
                            $("#ed_" + _this.id.split('ed')[1]).css("color", "#6E6E6E");
                            $("#ed_" + _this.id.split('ed')[1]).hide();

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
