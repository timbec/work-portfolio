<template lang="html">
   <article class="">
      <h1>Contact Me</h1>

      <form method="POST" action="https://tim-beckett.com/contact" accept-charset="UTF-8" class="form"><input name="_token" type="hidden" value="2SSVhjIHTKd1CnTz2UHZ2w9nHp3bgHy8VDcuRV8v">

    <div class="form-group">
        <label for="Your Name">Your Name</label>
        <input required="required" class="form-control" placeholder="Your name" name="name" type="text">
    </div>

    <div class="form-group">
        <label for="Your E-mail Address">Your E-mail Address</label>
        <input required="required" class="form-control" placeholder="Your e-mail address" name="email" type="text">
    </div>

    <div class="form-group">
        <label for="Your Message">Your Message</label>
        <textarea required="required" class="form-control" placeholder="Your message" name="message" cols="50" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Contact Us!">
    </div>
    </form>
   </article>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
