<script>
    export default {
        name: 'modal',
        props: {
            method: { type: Function },
            data: {type: Object}
        },
        data() {
            return {};
        },
        methods: {
            close() {
                this.$emit('close');
            },
            onDelete(){
                this.method(this.data.id);
            }
        }
    };
</script>
<template>
    <transition name="modal-fade">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete this data?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click.prevent="onDelete" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>