// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
'use strict';
window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form.reportValidity();
                $('.invalid-feedback').html('Campo obrigatório.');
            }
            else {
                $('.btn[type="submit"]').attr('disabled',true);
                $('#spinnerLoading').show();
            }
            
            form.classList.add('was-validated');
        }, false);
    });
}, false);
})();