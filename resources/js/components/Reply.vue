<script>
export default {
    props: ["attributes"],
    data() {
        return {
            editing: false,
            body: this.attributes.body,
            updating: false
        };
    },

    methods: {
        async update() {
            this.updating = true;

            await axios.patch("/replies/" + this.attributes.id, {
                body: this.body
            });

            this.editing = false;
            this.updating = false;
        },

        destroy() {
            axios.delete("/replies/" + this.attributes.id);

            this.$el.parentNode.removeChild(this.$el);

            flash("Your Reply Has Been Deleted");
        }
    }
};
</script>
