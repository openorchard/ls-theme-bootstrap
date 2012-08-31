<div class="span9">
    <?
        /*
        You will **need** to change the mailto: address in the form's action in order for this form to work properly.
        
        
        WARNING!!:
        This contact form is *very* insecure.  It is recommended you use a contact form that uses php and does not reveal the recipeint address in the HTML.
        The Contact module in the marketplace from Limehweel is a good start to making a more secure form.  http://lemonstand.com/marketplace/module/contact/
        */
    ?>
    
    <form enctype="text/plain" method="get" action="mailto:recipient@example.com">
        <label>Your First Name:</label> <input type="text" name="first_name"><br>
        <label>Your Last Name:</label> <input type="text" name="last_name"><br>
        <label>Comments:</label> <textarea rows="5" cols="30" name="comments"></textarea>
        <br>
        <input class="btn btn-primary" type="submit" value="Send">
    </form>
</div>