<template>
  <form class="comments__add-form" @submit.prevent="sendComment">
    <textarea class="comment__text-input" v-model="text" v-on:keypress.enter.prevent="$refs.submit.$el.click()"
              v-focus="focus" placeholder="Введите комментарий .."></textarea>
    <span class="comment__add-form--error" v-if="!$v.text.required">Обязательное поле</span>
    <span class="comment__add-form--error" v-if="!$v.text.maxLength">Максимальная длина {{$v.text.$params.maxLength.max}} символа</span>
    <vs-button circle ref="submit" size="large" :disabled="$v.$invalid" :loading="loading">Отправить</vs-button>
  </form>
</template>

<script>
import axios from 'axios';
import {required, maxLength} from 'vuelidate/lib/validators';
import {bus} from '../../bus.js';

export default {
  name: "CommentForm",
  data: function () {
    return {
      text: '',
      loading: false
    }
  },
  validations: {
    text: {
      required,
      maxLength: maxLength(255)
    },
  },
  props: {
    parentId: {
      type: Number,
      default: null,
    },
    comments: {
      type: Array,
    },
    focus: {
      type: Boolean,
      default: true,
    }
  },
  directives: {
    focus: {
      inserted: function (el, binding) {
        if (binding.value) el.focus()
      }
    }
  },
  methods: {
    sendComment() {
      let self = this;
      this.loading = true;
      axios.post(`${window.location.pathname}/comments`, {
        text: self.text,
        parentId: self.parentId,
      })
          .then(response => {
            this.$emit('hideForm');
            this.comments.push(response.data.comment);
            this.loading = false;
            this.text = '';
            this.$vs.notification({
              border: 'success',
              position: 'top-right',
              title: 'Комментарий добавлен',
            });
            bus.$emit('countCommentUpdate', response.data.commentsCount);
          })
          .catch(error => {
            for (let errorType in error.response.data.errors) {
              this.$vs.notification({
                border: 'danger',
                position: 'top-right',
                title: 'Произошла ошибка',
                text: error.response.data.errors[errorType][0]
              })
            }
            this.loading = false;
          });
    }
  },
}
</script>

<style scoped>

</style>
