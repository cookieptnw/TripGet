import Vue from "vue";
import Card from "./Card";
import Child from "./Child";
import Button from "./Button";
import Checkbox from "./Checkbox";
import { HasError, AlertError, AlertSuccess } from "vform";
import CatSearch from "./CatSearch";

// Components that are registered globaly.
[
  Card,
  Child,
  Button,
  Checkbox,
  HasError,
  AlertError,
  AlertSuccess,
  CatSearch
].forEach(Component => {
  Vue.component(Component.name, Component);
});
