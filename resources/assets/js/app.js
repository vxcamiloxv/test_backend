(function(){
    "use strict";

    var $ = window.$ = window.jQuery = require('jquery'),
        bootstrap = require('bootstrap-sass');

    // Constant
    var NOOP = function(){};

    // Run
    $( document ).ready(function() {
        var vehicles = new Vehicles();
        genYears();
        vehicles.get();

        // CSRF protection
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

        // Events
        $(document).on('click', "#vehicle-delete", function(e){
            var id = $(e.target).attr("data-vehicle");
            if(id) {
                vehicles.delete(id, function(err, res){
                    if(res) {
                        $(e.target).parents("tr").remove();
                    } else {
                        alert((err && err.message || "Unexpected error"));
                    }
                });
            }
        });
    });

    // Functions
    /**
     * @constructor
     * class Vehicles
     */
    function Vehicles() {
        this.vehicles = [];
    }

    /**
     * @name Vehicles#get
     * @description get list of all vehicles and append to content
     */
    Vehicles.prototype.get = function() {
        var self = this,
            content = "",
            i;
        $.ajax({
            url: "/vehicles",
            method: "GET"
        }).done(function(res){
            if(res && res.data) {
                self.vehicles = res.data;

                for(i = 0; i < res.data.length; i++) {
                    content += "<tr>" +
                        "<td class='table-text'><div>" + res.data[i].plate + "</div></td>" +
                        "<td class='table-text'><div>" + res.data[i].brand + "</div></td>" +
                        "<td class='table-text'><div>" + res.data[i].model + "</div></td>" +
                        "<td>" +
                        "<button id='vehicle-delete' class='btn btn-danger' data-vehicle='" + res.data[i].id +"'>" +
                        "<i class='fa fa-btn fa-trash'></i>Delete" +
                        "</button>" +
                        "</form>" +
                        "</td>" +
                        "</tr>";
                }
            }
            $("#vehiclesList").append(content);
        }).fail(function(err){

        });
    };

    /**
     * @name Vehicles#delete
     * @description Delete single vehicle
     *
     * @param {number} id of vehicle
     * @param {function} callback return error or success in nodejs style
     */
    Vehicles.prototype.delete = function(id, callback) {
        var self = this;

        callback = callback || NOOP;

        $.ajax({
            url: "/vehicles/" + id,
            method: "DELETE"
        }).done(function(res){
            if(res && res.status == 200) {

                self.vehicles = self.vehicles.filter(function(obj) {
                    return obj.id != id;
                });

                callback(null, res);
            } else {
                callback({status: 500, message: "Internal Error"});
            }
        }).fail(function(err){
            callback(err);
        });
    };

    /**
     * @name genYears
     * @description Append model years to select
     */
    function genYears() {
        var select = document.getElementById("vehicle-model"),
            options = "<option></option>",
            year = new Date().getFullYear(),
            i;

        for(i = year; i >= year-18; i--) {
            options += "<option value='" + i + "'>" + i + "</option>";
        }
        select.innerHTML = options;
    }
})();
