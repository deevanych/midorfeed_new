<template>
    <div class="comments__item">
        <a :href="comment.author.link" class="comments__item-author-avatar">
            <img :src="comment.author.avatar_url" alt="">
        </a>
        <div class="comments__item-body">
            <a :href="comment.author.link" class="comment-author">
                {{ comment.author.personaname }}
            </a>
            <div class="comments__item-text">
                {{ comment.text }}
            </div>
            <div class="comments__item-action">
                <div class="comments__item-create_time">
                    {{ created_at }}
                </div>
                <a href="#" class="comments__item-reply">ответить</a>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    name: "Comment",
    props: {
        comment: {
            type: Object,
            required: true,
        }
    },
    computed: {
        created_at() {
            moment.locale('ru');
            let self = this,
                created_at = moment(self.comment.created_at),
                now = moment();
            return moment.duration(created_at.diff(now)).humanize(true);
        }
    }

}
</script>

<style scoped>

</style>