//== Class definition
var SweetAlert = function() {

    //== Alert
    var initAlert= function() {
        $(document).ready(function(e) {
            $(document).on('click', '.print', function () {
                $(".print").hide();
                swal({
                    title: 'Preparing Download...',
                    text: "Do you wish to proceed with this download?",
                    type: 'warning',
                    buttons:{
                        cancel: {
                            visible: true,
                            text : 'No, cancel!',
                            className: 'btn btn-secondary'
                        },        			
                        confirm: {
                            text : 'Yes',
                            html: "Some Text" + "br" + 
                            '<button type="button" class="btn btn-primary" onclick="fetch()">' + 'Yes' + '</button>',
                            className : 'btn btn-success'
                        }
                    }
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Your download should start in a moment...", {
                            icon: "success",
                            buttons : {
                                confirm : {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                        
                    
                        var element = document.getElementById("invContents");
                        html2pdf(element, {
                        margin: 1,
                        filename: "My Prescription.pdf",
                        image: {
                            type: "jpeg",
                            quality: 1
                        },
                        html2canvas: { scale: 3, logging: true },
                        //jsPDF: { unit: "pt", format: "a3", orientation: "p" }
                        jsPDF: { unit: "pt", format: "a6", orientation: "p" }
                        });
                    } else {
                        swal("Download Aborted", {
                            icon: "warning",
                            buttons : {
                                confirm : {
                                    text : 'Close',
                                    className: 'btn btn-warning'
                                }
                            }
                        });
                    }
                });
            })
        })

    };

    return {
        //== Init
        init: function() {
            initAlert();
        },
    };
}();

//== Class Initialization
jQuery(document).ready(function() {
    SweetAlert.init();
});