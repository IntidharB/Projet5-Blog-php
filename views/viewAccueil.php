

<img src="media/Accueil-img1.jpeg" class="img1 w-100 mb-5" alt="">
<section class="container">
    <section>
        <h1 class=" text-center">Ben mrad Intidhar</h1>
        <div class="row">
          <p class="pt-5 col-9">Bonjour ! <br><br>
            Je m'appelle Ben mrad Intidhar, et je suit actuellement en formation pour devenir développeur web PHP/Symphony avec OpenclassRooms. J'ai débuté cette formation au mois d'août 2021, et j'ai déja beaucoup appris: <br>

            - J'ai commencé par ré-apprendre le language HTML 5 ainsi que le CSS 3. Une formalité obligatoire pour partir sur de bonnes bases... <br>
            - Ensuite, j'ai commencé à manipuler le CMS Wordpress. Grâce à mes aquis, j'ai mis en place un blog qui fonctionne grâce à ce CMS. <br>
            - J'ai par la suite continué à mettre mes compétences à l'épreuve en me séparrant d'un CMS en réalisant une cahier des charges  et en codant un prototype de site web le plus complet possible sans utiliser de PHP. J'ai utilisé le framework bootstrap pour parvenir à mes fins. <br>
            - Je me suis ensuite penché sur les étapes qui caractérisent la gestion d'un projet : diagrammes UML, gestions d'une base de donnée SQL, etc... <br>
            - Me voici finalement ici, sur ce blog que j'ai appris à réaliser entièrement en PHP orienté objet. <br>

            Et ce n'est pas terminé ! Ma formation continue et j'ai encore beaucoup de choses à apprendre.
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

