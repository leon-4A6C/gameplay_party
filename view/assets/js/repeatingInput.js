// class RepeatingInput {

//     constructor(parentElement, inputFunc, divClass) {
//         this.parentElement = parentElement;
//         this.input = inputFunc;
//         this.inputs = [];
//         this.divClass = divClass;

//         this.addInput();
//     }

//     addInput() {
//         let div = document.createElement("div");
//         let i = this.parentElement.children.length;
//         div.id = this.parentElement.id + "repeatingInput-" + i;
//         if(this.divClass)
//             div.classList.add(this.divClass);
//         div.innerHTML = this.input(i);

//         this.removeAddButton()

//         this.parentElement.appendChild(div)

//         div.querySelector(".repeating-add-button").addEventListener("click", () => this.addInput())
//         div.querySelector(".repeating-remove-button").addEventListener("click", () => this.removeInput(i))

//         this.inputs.push(div);
//     }

//     removeInput(i) {
//         this.parentElement.querySelector("#" + this.parentElement.id + "repeatingInput-" + i).remove()
//     }

//     removeAddButton() {
//         this.inputs.forEach(x => {
//             x.querySelector(".repeating-add-button").classList.add("repeating-invisible")
//             x.querySelector(".repeating-remove-button").classList.remove("repeating-invisible")
//         })
//     }

// }
"use strict";var _createClass=function(){function a(b,c){for(var e,d=0;d<c.length;d++)e=c[d],e.enumerable=e.enumerable||!1,e.configurable=!0,"value"in e&&(e.writable=!0),Object.defineProperty(b,e.key,e)}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}();function _classCallCheck(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}var RepeatingInput=function(){function a(b,c,d){_classCallCheck(this,a),this.parentElement=b,this.input=c,this.inputs=[],this.divClass=d,this.addInput()}return _createClass(a,[{key:"addInput",value:function addInput(){var d=this,b=document.createElement("div"),c=this.parentElement.children.length;b.id=this.parentElement.id+"repeatingInput-"+c,this.divClass&&b.classList.add(this.divClass),b.innerHTML=this.input(c),this.removeAddButton(),this.parentElement.appendChild(b),b.querySelector(".repeating-add-button").addEventListener("click",function(){return d.addInput()}),b.querySelector(".repeating-remove-button").addEventListener("click",function(){return d.removeInput(c)}),this.inputs.push(b)}},{key:"removeInput",value:function removeInput(b){this.parentElement.querySelector("#"+this.parentElement.id+"repeatingInput-"+b).remove()}},{key:"removeAddButton",value:function removeAddButton(){this.inputs.forEach(function(b){b.querySelector(".repeating-add-button").classList.add("repeating-invisible"),b.querySelector(".repeating-remove-button").classList.remove("repeating-invisible")})}}]),a}();