<template>
  <div style="position: relative">
    <t-input @focus="onFocus" v-model="value"></t-input>
    <div
      ref="datepicker"
      :class="{ hidden: !isFocused }"
      style="position: absolute"
    ></div>
    <div><button @click="setDate">セット</button></div>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  data() {
    return {
      value: "a",
      isFocused: false,
    };
  },
  mounted() {
    $(this.$refs.datepicker).datetimepicker({ viewMode: "YMDHM" });
    window.addEventListener("click", this.closeDropDown);
  },
  beforeDestroy() {
    window.removeEventListener("click", this.closeDropDown);
  },
  methods: {
    setDate() {},

    closeDropDown(event) {
      console.log(this.$el.contains(event.target));
      if (!this.$el.contains(event.target)) {
        this.isFocused = false;
      }
    },
    onBluer() {
      this.isFocused = false;
    },
    onFocus() {
      this.isFocused = true;
    },
  },
};
</script>

<style scoped>
.hidden {
  display: none;
}
</style>