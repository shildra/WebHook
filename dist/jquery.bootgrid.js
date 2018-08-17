/*! 
 * jQuery Bootgrid v1.1.3 - 10/21/2014
 * Copyright (c) 2014 Rafael Staib (http://www.jquery-bootgrid.com)
 * Licensed under MIT http://www.opensource.org/licenses/MIT
 */
! function(a, b) {
    "use strict";

    function c(a) {
        function b(b) {
            return c.identifier && b[c.identifier] === a[c.identifier]
        }
        var c = this;
        return this.rows.contains(b) ? !1 : (this.rows.push(a), !0)
    }

    function d(b) {
        return b ? a.extend({}, this.cachedParams, {
            ctx: b
        }) : this.cachedParams
    }

    function e() {
        var b = {
                current: this.current,
                rowCount: this.rowCount,
                sort: this.sort,
                searchPhrase: this.searchPhrase
            },
            c = this.options.post;
        return c = a.isFunction(c) ? c() : c, this.options.requestHandler(a.extend(!0, b, c))
    }

    function f(b) {
        return "." + a.trim(b).replace(/\s+/gm, ".")
    }

    function g() {
        var b = this.options.url;
        return a.isFunction(b) ? b() : b
    }

    function h() {
        this.element.trigger("initialize" + C), k.call(this), this.selection = this.options.selection && null != this.identifier, m.call(this), n.call(this), y.call(this), x.call(this), o.call(this), l.call(this), this.element.trigger("initialized" + C)
    }

    function i() {
        this.options.highlightRows
    }

    function j(a) {
        return a.visible
    }

    function k() {
        var b = this,
            c = this.element.find("thead > tr").first(),
            d = !1;
        c.children().each(function() {
            var c = a(this),
                e = c.data(),
                f = {
                    id: e.columnId,
                    identifier: null == b.identifier && e.identifier || !1,
                    converter: b.options.converters[e.converter || e.type] || b.options.converters.string,
                    text: c.text(),
                    align: e.align || "left",
                    headerAlign: e.headerAlign || "left",
                    cssClass: e.cssClass || "",
                    headerCssClass: e.headerCssClass || "",
                    formatter: b.options.formatters[e.formatter] || null,
                    order: d || "asc" !== e.order && "desc" !== e.order ? null : e.order,
                    searchable: !(e.searchable === !1),
                    sortable: !(e.sortable === !1),
                    visible: !(e.visible === !1)
                };
            b.columns.push(f), null != f.order && (b.sort[f.id] = f.order), f.identifier && (b.identifier = f.id, b.converter = f.converter), b.options.multiSort || null === f.order || (d = !0)
        })
    }

    function l() {
        function c(a) {
            for (var b, c = new RegExp(f.searchPhrase, f.options.caseSensitive ? "g" : "gi"), d = 0; d < f.columns.length; d++)
                if (b = f.columns[d], b.searchable && b.visible && b.converter.to(a[b.id]).search(c) > -1) return !0;
            return !1
        }

        function d(a, b) {
            f.currentRows = a, f.total = b, f.totalPages = Math.ceil(b / f.rowCount), f.options.keepSelection || (f.selectedRows = []), v.call(f, a), q.call(f), s.call(f), f.element._bgBusyAria(!1).trigger("loaded" + C)
        }
        var f = this,
            h = e.call(this),
            i = g.call(this);
        if (this.options.ajax && (null == i || "string" != typeof i || 0 === i.length)) throw new Error("Url setting must be a none empty string or a function that returns one.");
        if (this.element._bgBusyAria(!0).trigger("load" + C), A.call(this), this.options.ajax) f.xqr && f.xqr.abort(), f.xqr = a.post(i, h, function(b) {
            f.xqr = null, "string" == typeof b && (b = a.parseJSON(b)), b = f.options.responseHandler(b), f.current = b.current, d(b.rows, b.total)
        }).fail(function(a, b) {
            f.xqr = null, "abort" !== b && (r.call(f), f.element._bgBusyAria(!1).trigger("loaded" + C))
        });
        else {
            var j = this.searchPhrase.length > 0 ? this.rows.where(c) : this.rows,
                k = j.length; - 1 !== this.rowCount && (j = j.page(this.current, this.rowCount)), b.setTimeout(function() {
                d(j, k)
            }, 10)
        }
    }

    function m() {
        if (!this.options.ajax) {
            var b = this,
                d = this.element.find("tbody > tr");
            d.each(function() {
                var d = a(this),
                    e = d.children("td"),
                    f = {};
                a.each(b.columns, function(a, b) {
                    f[b.id] = b.converter.from(e.eq(a).text())
                }), c.call(b, f)
            }), this.total = this.rows.length, this.totalPages = -1 === this.rowCount ? 1 : Math.ceil(this.total / this.rowCount), B.call(this)
        }
    }

    function n() {
        var b = this.options.templates,
            c = this.element.parent().hasClass(this.options.css.responsiveTable) ? this.element.parent() : this.element;
        this.element.addClass(this.options.css.table), 0 === this.element.children("tbody").length && this.element.append(b.body), 1 & this.options.navigation && (this.header = a(b.header.resolve(d.call(this, {
            id: this.element._bgId() + "-header"
        }))), c.before(this.header)), 2 & this.options.navigation && (this.footer = a(b.footer.resolve(d.call(this, {
            id: this.element._bgId() + "-footer"
        }))), c.after(this.footer))
    }

    function o() {
        if (0 !== this.options.navigation) {
            var b = this.options.css,
                c = f(b.actions),
                e = this.header.find(c),
                g = this.footer.find(c);
            if (e.length + g.length > 0) {
                var h = this,
                    i = this.options.templates,
                    j = a(i.actions.resolve(d.call(this)));
                if (this.options.ajax) {
                    var k = i.icon.resolve(d.call(this, {
                            iconCss: b.iconRefresh
                        })),
                        m = a(i.actionButton.resolve(d.call(this, {
                            content: k,
                            text: this.options.labels.refresh
                        }))).on("click" + C, function(a) {
                            a.stopPropagation(), h.current = 1, l.call(h)
                        });
                    j.append(m)
                }
                u.call(this, j), p.call(this, j), z.call(this, e, j, 1), z.call(this, g, j, 2)
            }
        }
    }

    function p(b) {
        if (this.options.columnSelection && this.columns.length > 1) {
            var c = this,
                e = this.options.css,
                g = this.options.templates,
                h = g.icon.resolve(d.call(this, {
                    iconCss: e.iconColumns
                })),
                i = a(g.actionDropDown.resolve(d.call(this, {
                    content: h
                }))),
                k = f(e.dropDownItem),
                m = f(e.dropDownItemCheckbox),
                n = f(e.dropDownMenuItems);
            a.each(this.columns, function(b, h) {
                var o = a(g.actionDropDownCheckboxItem.resolve(d.call(c, {
                    name: h.id,
                    label: h.text,
                    checked: h.visible
                }))).on("click" + C, k, function(b) {
                    b.stopPropagation();
                    var d = a(this),
                        e = d.find(m);
                    if (!e.prop("disabled")) {
                        h.visible = e.prop("checked");
                        var f = c.columns.where(j).length > 1;
                        d.parents(n).find(k + ":has(" + m + ":checked)")._bgEnableAria(f).find(m)._bgEnableField(f), c.element.find("tbody").empty(), y.call(c), l.call(c)
                    }
                });
                i.find(f(e.dropDownMenuItems)).append(o)
            }), b.append(i)
        }
    }

    function q() {
        if (0 !== this.options.navigation) {
            var b = f(this.options.css.infos),
                c = this.header.find(b),
                e = this.footer.find(b);
            if (c.length + e.length > 0) {
                var g = this.current * this.rowCount,
                    h = a(this.options.templates.infos.resolve(d.call(this, {
                        end: 0 === this.total || -1 === g || g > this.total ? this.total : g,
                        start: 0 === this.total ? 0 : g - this.rowCount + 1,
                        total: this.total
                    })));
                z.call(this, c, h, 1), z.call(this, e, h, 2)
            }
        }
    }

    function r() {
        var a = this.element.children("tbody").first(),
            b = this.options.templates,
            c = this.columns.where(j).length;
        this.selection && (c += 1), a.html(b.noResults.resolve(d.call(this, {
            columns: c
        })))
    }

    function s() {
        if (0 !== this.options.navigation) {
            var b = f(this.options.css.pagination),
                c = this.header.find(b)._bgShowAria(-1 !== this.rowCount),
                e = this.footer.find(b)._bgShowAria(-1 !== this.rowCount);
            if (-1 !== this.rowCount && c.length + e.length > 0) {
                var g = this.options.templates,
                    h = this.current,
                    i = this.totalPages,
                    j = a(g.pagination.resolve(d.call(this))),
                    k = i - h,
                    l = -1 * (this.options.padding - h),
                    m = k >= this.options.padding ? Math.max(l, 1) : Math.max(l - this.options.padding + k, 1),
                    n = 2 * this.options.padding + 1,
                    o = i >= n ? n : i;
                t.call(this, j, "first", "&laquo;", "first")._bgEnableAria(h > 1), t.call(this, j, "prev", "&lt;", "prev")._bgEnableAria(h > 1);
                for (var p = 0; o > p; p++) {
                    var q = p + m;
                    t.call(this, j, q, q, "page-" + q)._bgEnableAria()._bgSelectAria(q === h)
                }
                0 === o && t.call(this, j, 1, 1, "page-1")._bgEnableAria(!1)._bgSelectAria(), t.call(this, j, "next", "&gt;", "next")._bgEnableAria(i > h), t.call(this, j, "last", "&raquo;", "last")._bgEnableAria(i > h), z.call(this, c, j, 1), z.call(this, e, j, 2)
            }
        }
    }

    function t(b, c, e, g) {
        var h = this,
            i = this.options.templates,
            j = this.options.css,
            k = d.call(this, {
                css: g,
                text: e,
                uri: "#" + c
            }),
            m = a(i.paginationItem.resolve(k)).on("click" + C, f(j.paginationButton), function(b) {
                b.stopPropagation();
                var c = a(this),
                    d = c.parent();
                if (!d.hasClass("active") && !d.hasClass("disabled")) {
                    var e = {
                            first: 1,
                            prev: h.current - 1,
                            next: h.current + 1,
                            last: h.totalPages
                        },
                        f = c.attr("href").substr(1);
                    h.current = e[f] || +f, l.call(h)
                }
                c.trigger("blur")
            });
        return b.append(m), m
    }

    function u(b) {
        function c(a) {
            return -1 === a ? e.options.labels.all : a
        }
        var e = this,
            g = this.options.rowCount;
        if (a.isArray(g)) {
            var h = this.options.css,
                i = this.options.templates,
                j = a(i.actionDropDown.resolve(d.call(this, {
                    content: this.rowCount
                }))),
                k = f(h.dropDownMenu),
                m = f(h.dropDownMenuText),
                n = f(h.dropDownMenuItems),
                o = f(h.dropDownItemButton);
            a.each(g, function(b, f) {
                var g = a(i.actionDropDownItem.resolve(d.call(e, {
                    text: c(f),
                    uri: "#" + f
                })))._bgSelectAria(f === e.rowCount).on("click" + C, o, function(b) {
                    b.preventDefault();
                    var d = a(this),
                        f = +d.attr("href").substr(1);
                    f !== e.rowCount && (e.current = 1, e.rowCount = f, d.parents(n).children().each(function() {
                        var b = a(this),
                            c = +b.find(o).attr("href").substr(1);
                        b._bgSelectAria(c === f)
                    }), d.parents(k).find(m).text(c(f)), l.call(e))
                });
                j.find(n).append(g)
            }), b.append(j)
        }
    }

    function v(b) {
        if (b.length > 0) {
            var c = this,
                e = this.options.css,
                g = this.options.templates,
                h = this.element.children("tbody").first(),
                i = !0,
                j = "",
                k = "",
                l = "",
                m = "";
            a.each(b, function(b, f) {
                if (k = "", l = ' data-row-id="' + (null == c.identifier ? b : f[c.identifier]) + '"', m = "", c.selection) {
                    var h = -1 !== a.inArray(f[c.identifier], c.selectedRows),
                        n = g.select.resolve(d.call(c, {
                            type: "checkbox",
                            value: f[c.identifier],
                            checked: h
                        }));
                    k += g.cell.resolve(d.call(c, {
                        content: n,
                        css: e.selectCell
                    })), i = i && h, h && (m += e.selected, l += ' aria-selected="true"')
                }
                a.each(c.columns, function(b, h) {
                    if (h.visible) {
                        var i = a.isFunction(h.formatter) ? h.formatter.call(c, h, f) : h.converter.to(f[h.id]),
                            j = h.cssClass.length > 0 ? " " + h.cssClass : "";
                        k += g.cell.resolve(d.call(c, {
                            content: null == i || "" === i ? "&nbsp;" : i,
                            css: ("right" === h.align ? e.right : "center" === h.align ? e.center : e.left) + j
                        }))
                    }
                }), m.length > 0 && (l += ' class="' + m + '"'), j += g.row.resolve(d.call(c, {
                    attr: l,
                    cells: k
                }))
            }), c.element.find("thead " + f(c.options.css.selectBox)).prop("checked", i), h.html(j), w.call(this, h)
        } else r.call(this)
    }

    function w(b) {
        var c = this,
            d = f(this.options.css.selectBox);
        this.selection && b.off("click" + C, d).on("click" + C, d, function(b) {
            b.stopPropagation();
            var d = a(this),
                e = c.converter.from(d.val());
            d.prop("checked") ? c.select([e]) : c.deselect([e])
        }), b.off("click" + C, "> tr").on("click" + C, "> tr", function(b) {
            b.stopPropagation();
            var d = a(this),
                e = null == c.identifier ? d.data("row-id") : c.converter.from(d.data("row-id") + ""),
                f = null == c.identifier ? c.currentRows[e] : c.currentRows.first(function(a) {
                    return a[c.identifier] === e
                });
            c.selection && c.options.rowSelect && (d.hasClass(c.options.css.selected) ? c.deselect([e]) : c.select([e])), c.element.trigger("click" + C, [c.columns, f])
        })
    }

    function x() {
        if (0 !== this.options.navigation) {
            var c = this.options.css,
                e = f(c.search),
                g = this.header.find(e),
                h = this.footer.find(e);
            if (g.length + h.length > 0) {
                var i = this,
                    j = this.options.templates,
                    k = null,
                    l = "",
                    m = f(c.searchField),
                    n = a(j.search.resolve(d.call(this))),
                    o = n.is(m) ? n : n.find(m);
                o.on("keyup" + C, function(c) {
                    c.stopPropagation();
                    var d = a(this).val();
                    l !== d && (l = d, b.clearTimeout(k), k = b.setTimeout(function() {
                        i.search(d)
                    }, 250))
                }), z.call(this, g, n, 1), z.call(this, h, n, 2)
            }
        }
    }

    function y() {
        var b = this,
            c = this.element.find("thead > tr"),
            e = this.options.css,
            g = this.options.templates,
            h = "",
            i = this.options.sorting;
        if (this.selection) {
            var j = this.options.multiSelect ? g.select.resolve(d.call(b, {
                type: "checkbox",
                value: "all"
            })) : "";
            h += g.rawHeaderCell.resolve(d.call(b, {
                content: j,
                css: e.selectCell
            }))
        }
        if (a.each(this.columns, function(a, c) {
            if (c.visible) {
                var f = b.sort[c.id],
                    j = i && f && "asc" === f ? e.iconUp : i && f && "desc" === f ? e.iconDown : "",
                    k = g.icon.resolve(d.call(b, {
                        iconCss: j
                    })),
                    l = c.headerAlign,
                    m = c.headerCssClass.length > 0 ? " " + c.headerCssClass : "";
                h += g.headerCell.resolve(d.call(b, {
                    column: c,
                    icon: k,
                    sortable: i && c.sortable && e.sortable || "",
                    css: ("right" === l ? e.right : "center" === l ? e.center : e.left) + m
                }))
            }
        }), c.html(h), i) {
            var k = f(e.sortable),
                m = f(e.icon);
            c.off("click" + C, k).on("click" + C, k, function(c) {
                c.preventDefault();
                var d = a(this),
                    f = d.data("column-id") || d.parents("th").first().data("column-id"),
                    g = b.sort[f],
                    h = d.find(m);
                if (b.options.multiSort || (d.parents("tr").first().find(m).removeClass(e.iconDown + " " + e.iconUp), b.sort = {}), g && "asc" === g) b.sort[f] = "desc", h.removeClass(e.iconUp).addClass(e.iconDown);
                else if (g && "desc" === g)
                    if (b.options.multiSort) {
                        var i = {};
                        for (var j in b.sort) j !== f && (i[j] = b.sort[j]);
                        b.sort = i, h.removeClass(e.iconDown)
                    } else b.sort[f] = "asc", h.removeClass(e.iconDown).addClass(e.iconUp);
                else b.sort[f] = "asc", h.addClass(e.iconUp);
                B.call(b), l.call(b)
            })
        }
        if (this.selection && this.options.multiSelect) {
            var n = f(e.selectBox);
            c.off("click" + C, n).on("click" + C, n, function(c) {
                c.stopPropagation(), a(this).prop("checked") ? b.select() : b.deselect()
            })
        }
    }

    function z(b, c, d) {
        this.options.navigation & d && b.each(function(b, d) {
            a(d).before(c.clone(!0)).remove()
        })
    }

    function A() {
        var a = this.options.templates,
            b = this.element.children("thead").first(),
            c = this.element.children("tbody").first(),
            e = c.find("tr > td").first(),
            f = this.element.height() - b.height() - (e.height() + 20),
            g = this.columns.where(j).length;
        this.selection && (g += 1), c.html(a.loading.resolve(d.call(this, {
            columns: g
        }))), -1 !== this.rowCount && f > 0 && c.find("tr > td").css("padding", "20px 0 " + f + "px")
    }

    function B() {
        function a(c, d, e) {
            function f(a) {
                return "asc" === h.order ? a : -1 * a
            }
            e = e || 0;
            var g = e + 1,
                h = b[e];
            return c[h.id] > d[h.id] ? f(1) : c[h.id] < d[h.id] ? f(-1) : b.length > g ? a(c, d, g) : 0
        }
        var b = [];
        if (!this.options.ajax) {
            for (var c in this.sort)(this.options.multiSort || 0 === b.length) && b.push({
                id: c,
                order: this.sort[c]
            });
            b.length > 0 && this.rows.sort(a)
        }
    }
    var C = ".rs.jquery.bootgrid",
        D = function(b, c) {
            this.element = a(b), this.origin = this.element.clone(), this.options = a.extend(!0, {}, D.defaults, this.element.data(), c);
            var d = this.options.rowCount = this.element.data().rowCount || c.rowCount || this.options.rowCount;
            this.columns = [], this.current = 1, this.currentRows = [], this.identifier = null, this.selection = !1, this.converter = null, this.rowCount = a.isArray(d) ? d[0] : d, this.rows = [], this.searchPhrase = "", this.selectedRows = [], this.sort = {}, this.total = 0, this.totalPages = 0, this.cachedParams = {
                lbl: this.options.labels,
                css: this.options.css,
                ctx: {}
            }, this.header = null, this.footer = null, this.xqr = null
        };
    if (D.defaults = {
        navigation: 3,
        padding: 5,
        columnSelection: !0,
        rowCount: [10, 25, 50, -1],
        selection: !1,
        multiSelect: !1,
        rowSelect: !1,
        keepSelection: !1,
        highlightRows: !1,
        sorting: !0,
        multiSort: !1,
        ajax: !1,
        post: {},
        url: "",
        caseSensitive: !0,
        requestHandler: function(a) {
            return a
        },
        responseHandler: function(a) {
            return a
        },
        converters: {
            numeric: {
                from: function(a) {
                    return +a
                },
                to: function(a) {
                    return a + ""
                }
            },
            string: {
                from: function(a) {
                    return a
                },
                to: function(a) {
                    return a
                }
            }
        },
        css: {
            actions: "actions btn-group",
            center: "text-center",
            columnHeaderAnchor: "column-header-anchor",
            columnHeaderText: "text",
            dropDownItem: "dropdown-item",
            dropDownItemButton: "dropdown-item-button",
            dropDownItemCheckbox: "dropdown-item-checkbox",
            dropDownMenu: "dropdown btn-group",
            dropDownMenuItems: "dropdown-menu pull-right",
            dropDownMenuText: "dropdown-text",
            footer: "bootgrid-footer container-fluid",
            header: "bootgrid-header container-fluid",
            icon: "icon glyphicon",
            iconColumns: "glyphicon-th-list",
            iconDown: "glyphicon-chevron-down",
            iconRefresh: "glyphicon-refresh",
            iconUp: "glyphicon-chevron-up",
            infos: "infos",
            left: "text-left",
            pagination: "pagination",
            paginationButton: "button",
            responsiveTable: "table-responsive",
            right: "text-right",
            search: "search form-group",
            searchField: "search-field form-control",
            selectBox: "select-box",
            selectCell: "select-cell",
            selected: "active",
            sortable: "sortable",
            table: "bootgrid-table table"
        },
        formatters: {},
        labels: {
            all: "All",
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} entries",
            loading: "Loading...",
            noResults: "No results found!",
            refresh: "Refresh",
            search: "Search"
        },
        templates: {
            actionButton: '<button class="btn btn-default" type="button" title="{{ctx.text}}">{{ctx.content}}</button>',
            actionDropDown: '<div class="{{css.dropDownMenu}}"><button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="{{css.dropDownMenuText}}">{{ctx.content}}</span> <span class="caret"></span></button><ul class="{{css.dropDownMenuItems}}" role="menu"></ul></div>',
            actionDropDownItem: '<li><a href="{{ctx.uri}}" class="{{css.dropDownItem}} {{css.dropDownItemButton}}">{{ctx.text}}</a></li>',
            actionDropDownCheckboxItem: '<li><label class="{{css.dropDownItem}}"><input name="{{ctx.name}}" type="checkbox" value="1" class="{{css.dropDownItemCheckbox}}" {{ctx.checked}} /> {{ctx.label}}</label></li>',
            actions: '<div class="{{css.actions}}"></div>',
            body: "<tbody></tbody>",
            cell: '<td class="{{ctx.css}}">{{ctx.content}}</td>',
            footer: '<div id="{{ctx.id}}" class="{{css.footer}}"><div class="row"><div class="col-sm-6"><p class="{{css.pagination}}"></p></div><div class="col-sm-6 infoBar"><p class="{{css.infos}}"></p></div></div></div>',
            header: '<div id="{{ctx.id}}" class="{{css.header}}"><div class="row"><div class="col-sm-12 actionBar"><p class="{{css.search}}"></p><p class="{{css.actions}}"></p></div></div></div>',
            headerCell: '<th data-column-id="{{ctx.column.id}}" class="{{ctx.css}}"><a href="javascript:void(0);" class="{{css.columnHeaderAnchor}} {{ctx.sortable}}"><span class="{{css.columnHeaderText}}">{{ctx.column.text}}</span>{{ctx.icon}}</a></th>',
            icon: '<span class="{{css.icon}} {{ctx.iconCss}}"></span>',
            infos: '<div class="{{css.infos}}">{{lbl.infos}}</div>',
            loading: '<tr><td colspan="{{ctx.columns}}" class="loading">{{lbl.loading}}</td></tr>',
            noResults: '<tr><td colspan="{{ctx.columns}}" class="no-results">{{lbl.noResults}}</td></tr>',
            pagination: '<ul class="{{css.pagination}}"></ul>',
            paginationItem: '<li class="{{ctx.css}}"><a href="{{ctx.uri}}" class="{{css.paginationButton}}">{{ctx.text}}</a></li>',
            rawHeaderCell: '<th class="{{ctx.css}}">{{ctx.content}}</th>',
            row: "<tr{{ctx.attr}}>{{ctx.cells}}</tr>",
            search: '<div class="{{css.search}}"><div class="input-group"><span class="{{css.icon}} input-group-addon glyphicon-search"></span> <input type="text" class="{{css.searchField}}" placeholder="{{lbl.search}}" /></div></div>',
            select: '<input name="select" type="{{ctx.type}}" class="{{css.selectBox}}" value="{{ctx.value}}" {{ctx.checked}} />'
        }
    }, D.prototype.append = function(a) {
        if (this.options.ajax);
        else {
            for (var b = [], d = 0; d < a.length; d++) c.call(this, a[d]) && b.push(a[d]);
            B.call(this), i.call(this, b), l.call(this), this.element.trigger("appended" + C, [b])
        }
        return this
    }, D.prototype.clear = function() {
        if (this.options.ajax);
        else {
            var b = a.extend([], this.rows);
            this.rows = [], this.current = 1, this.total = 0, l.call(this), this.element.trigger("cleared" + C, [b])
        }
        return this
    }, D.prototype.destroy = function() {
        return a(b).off(C), 1 & this.options.navigation && this.header.remove(), 2 & this.options.navigation && this.footer.remove(), this.element.before(this.origin).remove(), this
    }, D.prototype.reload = function() {
        return this.current = 1, l.call(this), this
    }, D.prototype.remove = function(a) {
        if (null != this.identifier) {
            if (this.options.ajax);
            else {
                a = a || this.selectedRows;
                for (var b, c = [], d = 0; d < a.length; d++) {
                    b = a[d];
                    for (var e = 0; e < this.rows.length; e++)
                        if (this.rows[e][this.identifier] === b) {
                            c.push(this.rows[e]), this.rows.splice(e, 1);
                            break
                        }
                }
                this.current = 1, l.call(this), this.element.trigger("removed" + C, [c])
            }
        }
        return this
    }, D.prototype.search = function(a) {
        return this.searchPhrase !== a && (this.current = 1, this.searchPhrase = a, l.call(this)), this
    }, D.prototype.select = function(b) {
        if (this.selection) {
            b = b || this.currentRows.propValues(this.identifier);
            for (var c, d, e = []; b.length > 0 && (this.options.multiSelect || 1 !== e.length);)
                if (c = b.pop(), -1 === a.inArray(c, this.selectedRows))
                    for (d = 0; d < this.currentRows.length; d++)
                        if (this.currentRows[d][this.identifier] === c) {
                            e.push(this.currentRows[d]), this.selectedRows.push(c);
                            break
                        }
            if (e.length > 0) {
                var g = f(this.options.css.selectBox),
                    h = this.selectedRows.length >= this.currentRows.length;
                for (d = 0; !this.options.keepSelection && h && d < this.currentRows.length;) h = -1 !== a.inArray(this.currentRows[d++][this.identifier], this.selectedRows);
                for (this.element.find("thead " + g).prop("checked", h), this.options.multiSelect || this.element.find("tbody > tr " + g + ":checked").trigger("click" + C), d = 0; d < this.selectedRows.length; d++) this.element.find('tbody > tr[data-row-id="' + this.selectedRows[d] + '"]').addClass(this.options.css.selected)._bgAria("selected", "true").find(g).prop("checked", !0);
                this.element.trigger("selected" + C, [e])
            }
        }
        return this
    }, D.prototype.deselect = function(b) {
        if (this.selection) {
            b = b || this.currentRows.propValues(this.identifier);
            for (var c, d, e, g = []; b.length > 0;)
                if (c = b.pop(), e = a.inArray(c, this.selectedRows), -1 !== e)
                    for (d = 0; d < this.currentRows.length; d++)
                        if (this.currentRows[d][this.identifier] === c) {
                            g.push(this.currentRows[d]), this.selectedRows.splice(e, 1);
                            break
                        }
            if (g.length > 0) {
                var h = f(this.options.css.selectBox);
                for (this.element.find("thead " + h).prop("checked", !1), d = 0; d < g.length; d++) this.element.find('tbody > tr[data-row-id="' + g[d][this.identifier] + '"]').removeClass(this.options.css.selected)._bgAria("selected", "false").find(h).prop("checked", !1);
                this.element.trigger("deselected" + C, [g])
            }
        }
        return this
    }, D.prototype.sort = function(b) {
        var c = b ? a.extend({}, b) : {};
        return c === this.sort ? this : (this.sort = c, y.call(this), B.call(this), l.call(this), this)
    }, a.fn.extend({
        _bgAria: function(a, b) {
            return this.attr("aria-" + a, b)
        },
        _bgBusyAria: function(a) {
            return null == a || a ? this._bgAria("busy", "true") : this._bgAria("busy", "false")
        },
        _bgRemoveAria: function(a) {
            return this.removeAttr("aria-" + a)
        },
        _bgEnableAria: function(a) {
            return null == a || a ? this.removeClass("disabled")._bgAria("disabled", "false") : this.addClass("disabled")._bgAria("disabled", "true")
        },
        _bgEnableField: function(a) {
            return null == a || a ? this.removeAttr("disabled") : this.attr("disabled", "disable")
        },
        _bgShowAria: function(a) {
            return null == a || a ? this.show()._bgAria("hidden", "false") : this.hide()._bgAria("hidden", "true")
        },
        _bgSelectAria: function(a) {
            return null == a || a ? this.addClass("active")._bgAria("selected", "true") : this.removeClass("active")._bgAria("selected", "false")
        },
        _bgId: function(a) {
            return a ? this.attr("id", a) : this.attr("id")
        }
    }), !String.prototype.resolve) {
        var E = {
            checked: function(a) {
                return "boolean" == typeof a ? a ? 'checked="checked"' : "" : a
            }
        };
        String.prototype.resolve = function(b, c) {
            var d = this;
            return a.each(b, function(b, e) {
                if (null != e && "function" != typeof e)
                    if ("object" == typeof e) {
                        var f = c ? a.extend([], c) : [];
                        f.push(b), d = d.resolve(e, f) + ""
                    } else {
                        E && E[b] && "function" == typeof E[b] && (e = E[b](e)), b = c ? c.join(".") + "." + b : b;
                        var g = new RegExp("\\{\\{" + b + "\\}\\}", "gm");
                        d = d.replace(g, e.replace ? e.replace(/\$/gi, "&#36;") : e)
                    }
            }), d
        }
    }
    Array.prototype.first || (Array.prototype.first = function(a) {
        for (var b = 0; b < this.length; b++) {
            var c = this[b];
            if (a(c)) return c
        }
        return null
    }), Array.prototype.contains || (Array.prototype.contains = function(a) {
        for (var b = 0; b < this.length; b++) {
            var c = this[b];
            if (a(c)) return !0
        }
        return !1
    }), Array.prototype.page || (Array.prototype.page = function(a, b) {
        var c = (a - 1) * b,
            d = c + b;
        return this.length > c ? this.length > d ? this.slice(c, d) : this.slice(c) : []
    }), Array.prototype.where || (Array.prototype.where = function(a) {
        for (var b = [], c = 0; c < this.length; c++) {
            var d = this[c];
            a(d) && b.push(d)
        }
        return b
    }), Array.prototype.propValues || (Array.prototype.propValues = function(a) {
        for (var b = [], c = 0; c < this.length; c++) b.push(this[c][a]);
        return b
    });
    var F = a.fn.bootgrid;
    a.fn.bootgrid = function(b) {
        var c = Array.prototype.slice.call(arguments, 1);
        return this.each(function() {
            var d = a(this),
                e = d.data(C),
                f = "object" == typeof b && b;
            if (e || "destroy" !== b) return e || (d.data(C, e = new D(this, f)), h.call(e)), "string" == typeof b ? e[b].apply(e, c) : void 0
        })
    }, a.fn.bootgrid.Constructor = D, a.fn.bootgrid.noConflict = function() {
        return a.fn.bootgrid = F, this
    }, a('[data-toggle="bootgrid"]').bootgrid()
}(jQuery, window);