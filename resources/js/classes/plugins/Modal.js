export default class Modal{
  constructor(){
    this.$inscription = $('#modal-inscription');
    if(this.$inscription.length){
      this.inscription();
    }
  }
  
  inscription(){
    UiKit.modal('#modal-inscription');
  }
  
}