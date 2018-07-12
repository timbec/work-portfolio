<template lang="html">
   <article class="form-container">
      <h1>Contact Me</h1>

      <form method="POST" action="https://tim-beckett.com/contact" accept-charset="UTF-8" class="form"><input name="_token" type="hidden" value="2SSVhjIHTKd1CnTz2UHZ2w9nHp3bgHy8VDcuRV8v">

    <div class="form-group">
        <label for="Your Name">Your Name</label>
        <input required="required" class="form-control" placeholder="Your name" name="name" type="text">
    </div>

    <div class="form-group">
        <label for="Your E-mail Address">Your E-mail Address</label>
        <input required="required" class="form-control" placeholder="Your e-mail address" name="email" type="text" v-model="email">
    </div>

    <div class="form-group">
        <label for="Your Message">Your Message</label>
        <textarea required="required" class="form-control" placeholder="Your message" name="message" cols="50" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Contact Me!">
    </div>
    </form>
    <div id="form-output">
        <p>Mail: {{ email }}</p>
    </div>
   </article>
</template>

<script>
export default {
    data () {
        return {
            email: ''
        }
    }
}
</script>

<style lang="css" scoped>
.form-container {
    display: grid; 

}

.form-group {
    display: flex; 
    flex-wrap: wrap; 
    align-items: center; 
    box-sizing: border-box; 
    margin-bottom: 50px; 
}

.form-group label {
    display: none; 
    flex: 1 0 120px; 
    max-width: 220px; 
    padding: 8px; 
    font-weight: 300; 
    letter-spacing: 0.09em; 
    text-transform: uppercase; 
}

.form-group input {
    padding: 15px; 
    cursor: auto; 
    flex: 1 0 220px; 
}

.form-group textarea {
    flex: 1 0 120px;; 
    padding: 15px; 
}

.form-group .btn {
        padding: 8px 16px;
        border: none;
        background: #09012d;
        color: #f2f2f2;
        text-transform: uppercase;
        letter-spacing: .09em;
        flex: 1 0 120px; 
        max-width: 200px; 
        border-radius: 2px;
        cursor: pointer; 
}

.btn:hover {
    background: #C6372C;
}

@media (min-width: 800px) {
    .form-group label {
        display: block; 
    }
}


</style>
