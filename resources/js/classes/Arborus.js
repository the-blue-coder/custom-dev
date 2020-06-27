import UiKit from "uikit";
import Calendar from "./plugins/calendar";
import Modal from "./plugins/modal";

export default class Arborus{
  constructor(){
    window.UiKit = UiKit;
    new Calendar();
    new Modal();
  }
}