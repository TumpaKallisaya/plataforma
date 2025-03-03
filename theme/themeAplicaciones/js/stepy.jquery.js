/*=== STEP BY STEP WIZARD ===*/
/*!
 * jQuery Stepy - A Wizard Plugin
 *
 * Licensed under The MIT License
 *
 * @version        1.1.0
 * @author         Washington Botelho
 * @documentation  wbotelhos.com/stepy
 *
 */
;
(function(b) {
    var a = {
        init: function(c) {
            return this.each(function() {
                var g = b.extend({}, b.fn.stepy.defaults, c),
                    m = b(this).data("options", g),
                    f = m.attr("id");
                if (f === undefined || f == "") {
                    f = "stepy-" + b("." + m.attr("class")).index(this);
                    m.attr("id", f);
                }
                var p = b("<ul/>", {
                    id: f + "-titles",
                    "class": "stepy-titles"
                });
                if (g.titleTarget) {
                    b(g.titleTarget).html(p);
                } else {
                    p.insertBefore(m);
                }
                if (g.validate) {
                    jQuery.validator.setDefaults({
                        ignore: g.ignore
                    });
                    m.append('<div class="stepy-error"/>');
                }
                var l = m.children("fieldset"),
                    e = undefined,
                    i = undefined,
                    o = "",
                    n = "";
                l.each(function(q) {
                    e = b(this);
                    e.addClass("step").attr("id", f + "-step-" + q).append('<p id="' + f + "-buttons-" + q + '" class="' + f + '-buttons"/>');
                    i = e.children("legend");
                    if (!g.legend) {
                        i.hide();
                    }
                    o = "";
                    if (g.description) {
                        if (i.length) {
                            o = "<span>" + i.html() + "</span>";
                        } else {
                            b.error(f + ": the legend element of the step " + (q + 1) + " is required to set the description!");
                        }
                    }
                    n = e.attr("title");
                    n = (n != "") ? "<div>" + n + "</div>" : "--";
                    p.append('<li id="' + f + "-title-" + q + '">' + n + o + "</li>");
                    if (q == 0) {
                        if (l.length > 1) {
                            a.createNextButton.call(m, q);
                        }
                    } else {
                        a.createBackButton.call(m, q);
                        e.hide();
                        if (q < l.length - 1) {
                            a.createNextButton.call(m, q);
                        }
                    }
                });
                var d = p.children();
                d.first().addClass("current-step");
                var h = m.children(".finish");
                if (g.finishButton) {
                    if (h.length) {
                        var k = m.is("form"),
                            j = undefined;
                        if (g.finish && k) {
                            j = m.attr("onsubmit");
                            m.attr("onsubmit", "return false;");
                        }
                        h.click(function(q) {
                            if (g.finish && !a.execute.call(m, g.finish, l.length - 1)) {
                                q.preventDefault();
                            } else {
                                if (k) {
                                    if (j) {
                                        m.attr("onsubmit", j);
                                    } else {
                                        m.removeAttr("onsubmit");
                                    }
                                    var r = h.attr("type") == "submit";
                                    if (!r && (!g.validate || a.validate.call(m, l.length - 1))) {
                                        m.submit();
                                    }
                                }
                            }
                        });
                        h.appendTo(m.find("p:last"));
                    } else {
                        b.error(f + ': element with class name "finish" missing!');
                    }
                }
                if (g.titleClick) {
                    d.click(function() {
                        var s = d.filter(".current-step").attr("id").split("-"),
                            r = parseInt(s[s.length - 1], 10),
                            q = b(this).index();
                        if (q > r) {
                            if (g.next && !a.execute.call(m, g.next, q)) {
                                return false;
                            }
                        } else {
                            if (q < r) {
                                if (g.back && !a.execute.call(m, g.back, q)) {
                                    return false;
                                }
                            }
                        }
                        if (q != r) {
                            a.step.call(m, (q) + 1);
                        }
                    });
                } else {
                    d.css("cursor", "default");
                }
                l.delegate('input[type="text"], input[type="password"]', "keypress", function(r) {
                    var t = (r.keyCode ? r.keyCode : r.which);
                    if (t == 13) {
                        r.preventDefault();
                        var s = b(this).parent().children("." + f + "-buttons");
                        if (s.length) {
                            var q = s.children(".button-next");
                            if (q.length) {
                                q.click();
                            } else {
                                var u = s.children(".finish");
                                if (u.length) {
                                    u.click();
                                }
                            }
                        }
                    }
                });
                l.first().find(":input:visible:enabled").first().select().focus();
            });
        },
        createBackButton: function(c) {
            var e = this,
                f = this.attr("id"),
                d = this.data("options");
            b("<a/>", {
                id: f + "-back-" + c,
                href: "javascript:void(0);",
                "class": "button-back btn btn-extend",
                html: d.backLabel
            }).click(function() {
                if (!d.back || a.execute.call(e, d.back, c - 1)) {
                    a.step.call(e, (c - 1) + 1);
                }
            }).appendTo(b("#" + f + "-buttons-" + c));
        },
        createNextButton: function(c) {
            var e = this,
                f = this.attr("id"),
                d = this.data("options");
            b("<a/>", {
                id: f + "-next-" + c,
                href: "javascript:void(0);",
                "class": "button-next btn btn-extend",
                html: d.nextLabel
            }).click(function() {
                if (!d.next || a.execute.call(e, d.next, c + 1)) {
                    a.step.call(e, (c + 1) + 1);
                }
            }).appendTo(b("#" + f + "-buttons-" + c));
        },
        execute: function(e, c) {
            var d = e.call(this, c + 1);
            return d || d === undefined;
        },
        step: function(e) {
            e--;
            var j = this.children("fieldset");
            if (e > j.length - 1) {
                e = j.length - 1;
            }
            var g = this.data("options");
            max = e;
            if (g.validate) {
                var h = true;
                for (var f = 0; f < e; f++) {
                    h &= a.validate.call(this, f);
                    if (g.block && !h) {
                        max = f;
                        break;
                    }
                }
            }
            j.hide().eq(max).show();
            var c = b("#" + this.attr("id") + "-titles").children();
            c.removeClass("current-step").eq(max).addClass("current-step");
            if (this.is("form")) {
                var d = undefined;
                if (max == e) {
                    d = j.eq(max).find(":input:enabled:visible");
                } else {
                    d = j.eq(max).find(".error").select().focus();
                }
                d.first().select().focus();
            }
            if (g.select) {
                g.select.call(this, max + 1);
            }
            return this;
        },
        validate: function(d) {
            if (!this.is("form")) {
                return true;
            }
            var c = this.children("fieldset").eq(d),
                h = true,
                f = b("#" + this.attr("id") + "-titles").children().eq(d),
                e = this.data("options"),
                g = this.validate();
            b(c.find(":input:enabled").get().reverse()).each(function() {
                var i = g.element(b(this));
                if (i === undefined) {
                    i = true;
                }
                h &= i;
                if (h) {
                    if (e.errorImage) {
                        f.removeClass("error-image");
                    }
                } else {
                    if (e.errorImage) {
                        f.addClass("error-image");
                    }
                    g.focusInvalid();
                }
            });
            return h;
        }
    };
    b.fn.stepy = function(c) {
        if (a[c]) {
            return a[c].apply(this, Array.prototype.slice.call(arguments, 1));
        } else {
            if (typeof c === "object" || !c) {
                return a.init.apply(this, arguments);
            } else {
                b.error("Method " + c + " does not exist!");
            }
        }
    };
    b.fn.stepy.defaults = {
        back: undefined,
        backLabel: "&lt; Back",
        block: false,
        description: true,
        errorImage: false,
        finish: undefined,
        finishButton: true,
        legend: true,
        ignore: "",
        next: undefined,
        nextLabel: "Next &gt;",
        titleClick: false,
        titleTarget: undefined,
        validate: false,
        select: undefined
    };
})(jQuery);