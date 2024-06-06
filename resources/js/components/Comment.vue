<template>
    <article class="comment" :id="'comment-' + comment.id">
      <div
        class="content"
        :contenteditable="isEditing"
        ref="editableContent"
        @blur="saveEdit"
        @input="onInput"
        :class="{ editable: isEditing }"
      >
        {{ comment.text }}
      </div>

      <footer class="meta">
        <div>
          <a :href="'/users/' + comment.user.id" class="author">
            <strong>{{ comment.user.name }}</strong>
          </a>
          <time :datetime="comment.created_at" class="has-text-grey">
            {{ formatTimeAgo(comment.created_at) }}
          </time>
        </div>

        <div class="comment-actions" v-if="isOwner">
          <button v-if="isEditing" @click="saveEdit">Save</button>
          <button v-else @click="enableEditing">Edit</button>
          <button @click="confirmDelete">Delete</button>
        </div>
      </footer>
    </article>
  </template>

  <script setup>
  import { defineProps, ref, computed, nextTick, getCurrentInstance } from 'vue';
  import { formatDistanceToNow } from 'date-fns';
  import axios from 'axios';

  const props = defineProps({
    comment: Object
  });

  const { proxy } = getCurrentInstance();
  const loggedInUserId = window.loggedInUserId;
  const isEditing = ref(false);
  const editableContent = ref(null);

  const enableEditing = () => {
    isEditing.value = true;
    nextTick(() => {
      editableContent.value.focus();
    });
  };

  const saveEdit = async () => {
    isEditing.value = false;
    const newContent = editableContent.value.innerText.trim();

    try {
      const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
      await axios.patch(`/api/comments/${props.comment.id}`, {
        text: newContent,
      }, {
        headers: {
          'X-CSRF-TOKEN': csrfToken
        }
      });
      props.comment.text = newContent;
      proxy.$eventBus.emit("flash", "Comment updated successfully");
    } catch (error) {
      console.error('Error updating comment:', error);
    }
  };

  const confirmDelete = async () => {
    if (confirm("Are you sure you want to delete this comment?")) {
      await deleteComment();
      proxy.$eventBus.emit("flash", "Comment deleted successfully");
      proxy.$emit('comment-deleted'); // Emit the event to parent component
    }
  };

  const deleteComment = async () => {
    try {
      const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
      await axios.delete(`/api/comments/${props.comment.id}`, {
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        withCredentials: true
      });
      // Remove comment from DOM
      document.getElementById(`comment-${props.comment.id}`).remove();
    } catch (error) {
      console.error('Error deleting comment:', error);
    }
  };

  const formatTimeAgo = (dateString) => {
    return formatDistanceToNow(new Date(dateString), { addSuffix: true, includeSeconds: true });
  };

  const isOwner = computed(() => {
    return props.comment.user_id === loggedInUserId;
  });
  </script>

  <style scoped>
  .comment-actions {
    display: flex;
    gap: 10px;
    margin-top: 10px;
  }

  .comment-actions button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
  }

  .comment-actions button:hover {
    background-color: #0056b3;
  }

  .meta {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 10px;
  }

  .meta .author,
  .meta time {
    margin-right: 10px;
  }
  </style>


