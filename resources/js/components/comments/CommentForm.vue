<template>
    <form class="comments__add-form" @submit.prevent="sendComment">
        <textarea class="comment__text-input" v-model="text" v-on:keypress.enter.prevent="$refs.submit.$el.click()" v-focus placeholder="Введите комментарий .."></textarea>
        <span class="comment__add-form--error" v-if="!$v.text.required">Обязательное поле</span>
        <span class="comment__add-form--error" v-if="!$v.text.maxLength">Максимальная длина {{$v.text.$params.maxLength.max}} символа</span>
        <vs-button circle ref="submit" size="large" :disabled="$v.$invalid" :loading="loading">Отправить</vs-button>
    </form>
</template>

<script>
    import axios from 'axios';
    import { required, maxLength } from 'vuelidate/lib/validators'

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
            modelType: {
                type: String,
                required: true,
            },
            modelId: {
                type: String,
                required: true,
            },
            parentId: {
                type: Number,
                default: null,
            },
            comments: {
                type: Array,
            }
        },
        directives: {
            focus: {
                // определение директивы
                inserted: function (el) {
                    el.focus()
                }
            }
        },
        methods: {
            sendComment() {
                let self = this;
                this.loading = true;
                axios.post('/comments', {
                    modelType: self.modelType,
                    modelId: self.modelId,
                    text: self.text,
                    parentId: self.parentId,
                })
                    .then(response => {
                        this.$emit('hideForm');
                        this.comments.push(response.data);
                        this.loading = false;
                        this.text = '';
                        this.$vs.notification({
                            border: 'success',
                            position: 'top-right',
                            title: 'Комментарий добавлен',
                        })
                    })
                    .catch(error => {
                        this.$vs.notification({
                            border: 'success',
                            position: 'top-right',
                            title: 'Произошла ошибка',
                            text: error.response.data.errors.text[0]
                        })
                        this.loading = false;
                    });
            }
        },
    }
</script>

<style scoped>

</style>
