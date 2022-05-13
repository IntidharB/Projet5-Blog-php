

<img src="media/Accueil-img1.jpeg" class="img1 w-100 mb-5" alt="">
<section class="container">
    <section>
        <h1 class=" text-center">Ben mrad Intidhar</h1>
        <div class="row">
          <p class="pt-5 col-9">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae magni minima dolorem, mollitia maiores in iure reprehenderit dolorum consequuntur distinctio, at itaque, animi aut natus iste id delectus quo fuga!
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae magni minima dolorem, mollitia maiores in iure reprehenderit dolorum consequuntur distinctio, at itaque, animi aut natus iste id delectus quo fuga!
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae magni minima dolorem, mollitia maiores in iure reprehenderit dolorum consequuntur distinctio, at itaque, animi aut natus iste id delectus quo fuga!
          </p>
          <img src="media/Accueil-img2.jpg" class="img2 col-3 img-fluid float-end"  alt="">
        </div>
    </section>
        <hr />

        <section>
        <h2 class=" text-center">Contactez-Moi</h2>
            <form method="POST" action="/projet5-blog-php/EnvoyerMsg" class="p-5">
                
                  <div class="row">
                    <div class="col">
                        <label>Nom</label>
                        <input name="nom" type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Entrez votre nom.">
                    </div>
                    <div class="col">
                    <label>Prénom</label>
                        <input name="prenom" type="text" class="form-control" placeholder="Prénom" required data-validation-required-message="Entrez votre nom.">
                        
                    </div>
                
                  </div>
            

                  <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email</label>
                        <input  name="mail" type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Entrez votre adresse email.">
                        <p class="help-block text-danger"></p>
                  </div>

                  <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea name="message" rows="5" class="form-control" placeholder="Votre Message" id="message" required data-validation-required-message="Entrez un message."></textarea>
                        <p class="help-block text-danger"></p>
                  </div>
                <button type="submit" class="btn btn-primary" name="btn-valider">Envoyer</button>
            </form>
        </section>

        <p class="text-center pb-3">Retrouvez également mon CV en cliquant 
          <a href="media/doc/monCV.pdf">ici.</a>
        </p>
       
      
</section> 

