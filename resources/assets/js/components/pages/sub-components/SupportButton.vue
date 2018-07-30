<template lang="html">
  <div>

     <button class="button contact-me-link"
     @click="$modal.show('contact-support-modal')">
     Contact Me
     </button>

  <modal name="contact-support-modal"
  height="auto"
  width="100%"
  >
  <div class="full-modal modal">
     <div class="modal-background"></div>
     <div class="container">
     <h1 class="">Contact Me</h1>
     <form
        autocomplete="off"
        @submit.prevent="contactSupport"
        @keydown="submitted = false"
        class=""
        >
        <ul class="flex-outer">
          <li class="control">
             <label for="first-name">Your Name</label>
              <input
                  type="text"
                  name="name"
                  id="name"
                  class="input-is-primary"
                  placeholder="What is your name?"
                  v-model="message.name"
                  required>
          </li>

           <li class="control">
             <label for="last-name">Your Email</label>
             <input
                  type="email"
                  name="email"
                  id="email"
                  class="input-is-minimal"
                  placeholder="What is your email?"
                  v-model="message.email"
                  required>


           </li>

           <li class="control">
             <label for="message">Message</label>
             <textarea
                  id="body"
                  class="input-is-minimal"
                  name="message"
                  data-autosize
                  placeholder="What's your message?"
                  v-model="message.message"
                  required>
               </textarea>
           </li>

           <li class="control">
             <label for="verification">Verify You Are Human</label>
             <input
               name="verification"
               id="verification"
               class="input-is-minimal"
               placeholder="What is 1 + 4"
               v-model="message.verification"
               required
             >
          </li>

           <li class="control">
             <button class="button cancel" @click="$modal.hide('contact-support-modal')">
             Cancel
             </button>
             <button class="button is-primary" type="submit"
               name="button"
               :disabled="submitted">
                 Send
             </button>
          </li>
        </ul>
     </form>
  </div>
  </div>
  </modal>
  </div>
</template>

<script>
import axios from 'axios';
export default {
   data() {
      return {
         message: {},
         errors: {},
         submitted: false
      }
   },
   methods: {
      contactSupport() {
         this.submitted = true;
         axios
            .post('/contact-form', this.message )
            .then(() => {

               this.$modal.hide('contact-support-modal');
               this.resetForm();
               alert('thanks, we will be in touch soon.');
            })
            .catch(errors => {
               this.errors = errors.response;
            })

      },
      resetForm() {
         this.message = {}
      }
   }
}
</script>

<style lang="css" scoped>
.button.contact-me-link {
   background: #C6372C;
   color: white;
   padding: 10px 15px;
   margin-top: 50px;
}

.button.contact-me-link:hover {
   background: white;
   color: #C6372C;
   border: 1px solid #C6372C;
}

.v--modal-overlay {
   background-color: rgba(0, 0, 0, 0.8);
}

.v--modal-box.v--modal, .v--modal {
   background-color: transparent;
   box-shadow: none;
}

.container {
width: 80%;
max-width: 1200px;
margin: 0 auto;
}

.container * {
box-sizing: border-box;
}

.flex-outer,
.flex-inner {
list-style-type: none;
padding: 0;
}

.flex-outer {
max-width: 800px;
margin: 0 auto;
}

.flex-outer li,
.flex-inner {
display: flex;
flex-wrap: wrap;
align-items: center;
}

.flex-inner {
padding: 0 8px;
justify-content: space-between;
}

.flex-outer > li:not(:last-child) {
margin-bottom: 20px;
}

.flex-outer li label,
.flex-outer li p {
padding: 8px;
font-weight: 300;
letter-spacing: .09em;
text-transform: uppercase;
color: white;
}

.flex-outer > li > label,
.flex-outer li p {
flex: 1 0 120px;
max-width: 220px;
}

.flex-outer > li > label + *,
.flex-inner {
flex: 1 0 220px;
}

.flex-outer li p {
margin: 0;
}

.flex-outer li input:not([type='checkbox']),
.flex-outer li textarea {
padding: 15px;
border: none;
}

.flex-outer li button {
margin-left: auto;
padding: 8px 16px;
border: none;
background: #C6372C;
color: #ffffff;
text-transform: uppercase;
letter-spacing: .09em;
border-radius: 2px;
}

.flex-out li button:hover {
   background: white;
   color: #C6372C;
   border: 1px solid #C6372C;
}

.flex-inner li {
width: 100px;
}

</style>
