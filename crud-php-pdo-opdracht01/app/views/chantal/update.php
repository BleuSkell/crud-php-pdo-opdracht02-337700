<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 border">

            <h3><?= $data['title']; ?></h3>

            <form action="<?= URLROOT ?>/chantal/update/<?= $data['ID']; ?>" method="post">
                <h5>Kies 4 basiskleuren voor uw nagels:</h5>
                <input type="color" name="color1" id="color1" class="color1">
                <input type="color" name="color2" id="color2" class="color2">
                <input type="color" name="color3" id="color3" class="color3">
                <input type="color" name="color4" id="color4" class="color4">

                <h5>Uw telefoonnummer:</h5>
                <input type="tel" name="phone" id="phone" required>

                <h5>Uw e-mailadres:</h5>
                <input type="email" name="mail" id="mail" required>

                <h5>Afspraak datum:</h5>
                <input type="date" name="appointment" id="appointment" required>

                <h5>Soort behandeling:</h5>
                <input type="checkbox" name="treatment1" id="treatment1" class="form-check-input" value="option1">
                <label for="treatment1">Nagclbilt arrangement (tcrmilnbctaling mogclijk) C180</label>

                <input type="checkbox" name="treatment2" id="treatment2" class="form-check-input" value="option2">
                <label for="treatment2">Luxe manicure (massage en handoakkins)</label>

                <input type="checkbox" name="treatment3" id="treatment3" class="form-check-input" value="option3">
                <label for="treatment3">Nagelreparatie per nagel (in eerste week gratis) 5,00</label>
                
                <br>
                <input type="hidden" name="appointmentID" value="<?= $data['ID']; ?>">
                <input type="submit" value="Sla op" class="btn btn-primary btn-lg">
                <input type="reset" value="Reset" class="btn btn-primary btn-lg">
            </form>
            <a href="<?= URLROOT; ?>/Homepages/index">Homepage</a>
        </div>
    </div>
</div>



<?php require APPROOT . "/views/includes/footer.php"; ?>