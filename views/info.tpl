{* Smarty *}
<!doctype html>
<html lang="fr" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <title>{$titre}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#myModal").modal('show');
            });
        </script>
    </head>
    <body>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{$titre}</h5>

                    </div>
                    <div class="modal-body">
                        <p>{$msg}</p>
                        <button type="button" class="close" data-dismiss="modal" onclick="window.location='{$redirect}';">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>