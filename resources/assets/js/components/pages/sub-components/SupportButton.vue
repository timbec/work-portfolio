<template lang="html">
  <div>
     <a href="#" class="contact-me-link"
     @click="$modal.show('contact-support-modal')">
     Contact Me
     </a>

  <modal name="contact-support-modal"
  height="auto"
  width="100%"
  :pivotY="1"
  >
  <div class="full-modal">
     <h1>Contact Me</h1>
     <form
        autocomplete="off"
        @submit.prevent="contactSupport"
        @keydown="submitted = false"
        >
        <div class="control">
           <input
               type="text"
               name="name"
               id="name"
               class="input-is-minimal"
               placeholder="What is your name?"
               v-model="message.name"
               required>
        </div>

        <div class="control">
           <input
               type="email"
               name="email"
               id="email"
               class="input-is-minimal"
               placeholder="What is your email?"
               v-model="message.email"
               required>


        </div>

        <div class="control">
           <textarea

               id="body"
               class="input-is-minimal"
               name="message"
               data-autosize
               placeholder="What's your message?"
               v-model="message.message"
               required>
            </textarea>
        </div>

        <div class="control">
           <input
            name="verification"
            id="verification"
            class="input-is-minimal"
            placeholder="What is 1 + 4"
            v-model="message.verification"
            required
           >
        </div>

        <div class="flex">
           <a @click="$modal.hide('contact-support-modal')">Cancel</a>
           <button type="submit"
            name="button"
            :disabled="submitted">
              Send
           </button>
        </div>
     </form>
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
            .post('/contact', this.message )
            .then(() => {
               this.$modal.hide('contact-support-modal');
               this.resetForm();
               alert('thanks, we will be in touch soon.');
            })
            .catch(errors => {
               this.errors = errors.response.data.errors;
            })

      }
   },

   resetForm() {
      this.message = {}
   }
}
</script>

<style lang="css" scoped>
.v--modal-overlay {
   background: rgba(255, 255, 255, 0.8);
}

</style>
