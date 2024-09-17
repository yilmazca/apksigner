// Variable to hold request
var request;

$(document).ready(function () {

    var unsignedApkTable = $('#unsignedAPKTable');
    var signedApkTable = $('#signedAPKTable');


    $('#unsignedAPKTable').DataTable({
        "method": "GET",
        "autoWidth": true,
        "paging": false,
        "processing": true,
        //'serverSide': true,
        "serverMethod": 'get',
        "info": false,
        "autofill": true,
        "select": true,
        "pageLength": 15,
        "cache": true,
        "contentType": 'application/json',
        ajax: {
            "url": '/files/list' + '?is_unsigned=true',
            "type": "GET",
            "dataSrc": "",
            complete: function (data) {
                //console.log(data);
            }
        },
        columns: [
            { "data": "id" },
            { "data": "file_name" },
            { "data": "updated_at" },
            {
                "data": null,
                "name": "buttonColumn",
                "render": function (data, type, row) {
                    var html = '' +
                        '<a href="#" sign-id="' + row.id + '"  class="btn btn-link btn-success sign-file p-1" title="Create Signed APK"><i class="mdi mdi-cog-play-outline mdi-24px"></i></a>';
                    return html;
                }
            },
        ],
    });

    $('#signedAPKTable').DataTable({
        "method": "GET",
        "autoWidth": true,
        "paging": false,
        "processing": true,
        //'serverSide': true,
        "serverMethod": 'get',
        "info": false,
        "autofill": true,
        "select": true,
        "pageLength": 15,
        "cache": true,
        "contentType": 'application/json',
        ajax: {
            "url": '/files/list' + '?is_unsigned=false',
            "type": "GET",
            "dataSrc": "",
            complete: function (data) {
                console.log(data);
            }
        },
        columns: [
            { "data": "id" },
            { "data": "file_name" },
            { "data": "updated_at" },
            { "data": "download_at" },
            {
                "data": null,
                "name": "buttonColumn",
                "render": function (data, type, row) {
                    var html = '' +
                        '<a href="' + baseURL + '/downloads/file?file_id=' + row.id + '&is_unsigned=0" download-id="' + row.id + '" class="btn btn-link btn-success download-file p-1" title="Download Unsigned APK"><i class="mdi mdi-monitor-arrow-down-variant mdi-24px"></i></a>';
                    return html;
                }
            },
        ],
    });

    //sign file click event
    $(document).on("click", ".sign-file", function (e) {

        e.preventDefault();
        // Abort any pending request
        if (request) {
            request.abort();
        }

        var data = { file_id: $(this).attr('sign-id') }

        request = $.ajax({
            url: "/apk/sign",
            type: "post",
            data: data,
            dataType: "json",
            //async: false,
            beforeSend: function () {
                $('.uploadPreLoader').removeClass('d-none').addClass('d-flex');
                $('body').block({
                    message: $('.uploadPreLoader'),
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#fff',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .8,
                    }
                });
            },
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            console.log('response');
            console.log(response);
            $('body').unblock();
            $('.uploadPreLoader').addClass('d-none').removeClass('d-flex');

            if (response.status == 'success') {
                swal("Success", response.message, "success");
                unsignedApkTable.DataTable().ajax.reload();
                signedApkTable.DataTable().ajax.reload();
            }

            if (response.status == 'error') {
                swal("Error!", response.message, "error");
            }

        });

    });








});