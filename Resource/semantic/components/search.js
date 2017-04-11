














































































                      .children(selector.result).eq(resultIndex)
                    .addClass(className.active)
                    .addClass(className.active)
                    .children().eq(categoryIndex)
                    .children(selector.result).eq(resultIndex)
                    // content fuzzy matches (last in results)
                    // content starts with value (first in results)
                    addResult(fuzzyResults, content);
                    addResult(results, content);
                    result = category.results[index]
                    result.id = module.create.id(resultIndex, categoryIndex);
                    return false;
                  + ' <img src="' + result[fields.image] + '">'
                  + '</div>'
                  + '<div class="image">'
                  .addClass(className.active)
                  .addClass(className.active)
                  .closest($category)
                  .closest($category)
                  // dont continue searching if a result is found
                  : 'keyup'
                  : false,
                  ;
                  ? $title.text()
                  ? 'propertychange'
                  animation  : settings.transition + ' in',
                  animation  : settings.transition + ' out',
                  array.push(result);
                  console.log(data['Name'] + ': ' + data['Execution Time']+'ms');
                  debug      : settings.debug,
                  debug      : settings.debug,
                  duration   : settings.duration,
                  duration   : settings.duration,
                  else if(settings.searchFullText && module.fuzzySearch(searchTerm, content[field]) ) {
                  fieldExists = (typeof content[field] == 'string')
                  html    : searchHTML,
                  if( content[field].search(matchRegExp) !== -1) {
                  if(result) {
                  if(result.id === undefined) {
                  module.debug('Custom onSelect callback cancelled default select action');
                  module.displayMessage(error.serverError);
                  module.error(error.maxResults);
                  module.inject.result(result, resultIndex, categoryIndex);
                  module.parse.response.call(element, response, searchTerm);
                  notFuzzyResult = ($.inArray(result, fuzzyResults) == -1)
                  notResult      = ($.inArray(result, results) == -1),
                  query: searchTerm
                  queue      : true
                  queue      : true
                  result = module.search.object(value, category.results, lookupFields)[0];
                  result = results[index]
                  result.id = module.create.id(resultIndex);
                  resultIndex++;
                  results : response[fields.results]
                  return;
                  var
                  verbose    : settings.verbose,
                  verbose    : settings.verbose,
                  window.location.href = (href);
                  window.open(href);
                  }
                  }
                  }
                  }
                $.each(category.results, function(index, value) {
                $.each(performance, function(index, data) {
                $link   = $result.find('a[href]').eq(0),
                $result = $(this),
                $title  = $result.find(selector.title).eq(0),
                'Arguments'      : [].slice.call(message, 1) || '',
                'Element'        : element,
                'Execution Time' : executionTime
                'Name'           : message[0],
                + '</div>'
                .addClass(className.results)
                .appendTo($module)
                .attr('autocomplete', 'off')
                .data(metadata.cache, cache)
                .eq(newIndex)
                .eq(newIndex)
                .fadeIn(settings.duration, settings.easing)
                .fadeOut(settings.duration, settings.easing)
                .on(module.get.inputEvent() + eventNamespace, selector.prompt, module.event.input)
                .removeClass(className.active)
                .removeClass(className.active)
                .removeClass(className.active)
                .removeClass(className.active)
                .stop()
                .stop()
                .transition({
                .transition({
                // title is used for result lookup
                : $results
                : (prompt !== undefined && prompt.onpropertychange !== undefined)
                : currentIndex + 1
                : currentIndex - 1
                : false
                : query
                : {}
                ;
                ;
                ;
                ;
                ? $module.data(metadata.cache)
                ? $results
                ? 'input'
                ? cache[name]
                ? currentIndex
                ? currentIndex
                ? value + query[depth + 1].charAt(0).toUpperCase() + query[depth + 1].slice(1)
                action    : 'search',
                cache     : 'local',
                categoryIndex++;
                console.table(performance);
                continue search;
                debug     : settings.debug,
                else {
                event.preventDefault();
                found = object[camelCaseValue];
                found = object[value];
                href    = $link.attr('href')   || false,
                html  += '<a class="result" href="' + response[fields.url] + '">';
                html  += '<a class="result">';
                html += ''
                html += '<div class="description">' + result[fields.description] + '</div>';
                html += '<div class="price">' + result[fields.price] + '</div>';
                html += '<div class="title">' + result[fields.title] + '</div>';
                if($.isArray(category.results)) {
                if(fieldExists) {
                if(notResult && notFuzzyResult) {
                if(result.id === undefined) {
                if(settings.onSelect.call(element, result, results) === false) {
                if(settings.type == 'standard') {
                if(target == '_blank' || event.ctrlKey) {
                module.addResults(searchHTML);
                module.error(error.source);
                module.event.result.click.call($result.filter('.' + className.active), event);
                module.inject.id(response[fields.results]);
                module.inject.result(result, resultIndex);
                module.save.results(response[fields.results]);
                module.search.local(searchTerm);
                module.search.remote(searchTerm);
                module.set.value(value);
                module.showResults();
                module.verbose('Opening search link found in result', $link);
                module.write.cache(searchTerm, {
                object = object[camelCaseValue];
                object = object[value];
                on        : false,
                onError   : module.error
                onFailure: function() {
                onSuccess : function(response) {
                response[fields.results] = response[fields.results].slice(0, settings.maxResults);
                result  = $result.data(metadata.result) || module.get.result(value, results),
                resultIndex = 0;
                resultIndex++;
                results = module.get.results(),
                return false;
                return false;
                return false;
                return false;
                returnedValue
                target  = $link.attr('target') || false,
                title   = $title.html(),
                urlData: {
                value   = ($title.length > 0)
                var
                var
                var
                }
                }
                }
                }
                }
                }
                }
                }
                }
                })
                })
                });
                });
                });
                },
                },
              $.each(results, function(index, category) {
              $.each(results, function(index, category) {
              $.each(results, function(index, value) {
              $.each(source, function(label, content) {
              $category
              $category
              $module
              $module
              $module.addClass(settings.type);
              $module.api('abort');
              $module.data(metadata.cache, cache);
              $module.removeData(metadata.cache);
              $prompt
              $prompt.one('keyup', module.remove.buttonFocus);
              $result
              $result
              $results
              $results
              $results
              $results
              $results = $('<div />')
              $selectedResult = (categoryIndex !== undefined)
              + ' <img src="' + result[fields.image] + '">'
              + '</div>'
              + '</div>'
              + '<div class="image">'
              .api('query')
              .api('setting', apiSettings)
              .data(metadata.result, result)
              .on('blur'      + eventNamespace, selector.prompt, module.event.blur)
              .on('click'     + eventNamespace, selector.result,  module.event.result.click)
              .on('click'     + eventNamespace, selector.searchButton, module.query)
              .on('focus'     + eventNamespace, selector.prompt, module.event.focus)
              .on('keydown'   + eventNamespace, selector.prompt, module.handleKeyboard)
              .on('mousedown' + eventNamespace, selector.results, module.event.result.mousedown)
              .on('mouseup'   + eventNamespace, selector.results, module.event.result.mouseup)
              .trigger('blur')
              .val(value)
              // avoid duplicates when pushing results
              // iterate through each category result
              // prompt
              // results
              // search button
              // since results may be object, we must use counters
              // start char code for "A"
              // top level
              : module.get.results()
              : module.get.value()
              : settings.searchFields
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ;
              ? results
              ? searchFields
              ? value
              addResult = function(array, result) {
              apiSettings = {
              apiSettings = {
              backspace : 8,
              cache = $module.data(metadata.cache)
              cache = $module.data(metadata.cache)
              cache = ($module.data(metadata.cache) !== undefined)
              cache[name] = value;
              categoryID    = (categoryIndex + 1),
              categoryIndex = 0,
              console.groupCollapsed(title);
              console.groupEnd();
              currentTime   = new Date().getTime();
              currentTime,
              delete cache[value];
              downArrow : 40
              else if( $.isPlainObject( object[value] ) && (depth != maxDepth) ) {
              else if( module.can.useAPI() ) {
              else if( object[camelCaseValue] !== undefined ) {
              else if( object[value] !== undefined ) {
              else {
              else {
              else {
              else {
              else {
              enter     : 13,
              escape    : 27,
              event.preventDefault();
              event.preventDefault();
              executionTime = currentTime - previousTime;
              executionTime,
              firstCharCode,
              fuzzyResults = [],
              html    : searchHTML,
              html  += ''
              html += '</a>';
              html += '<div class="content">';
              html += '<div class="name">' + category[fields.categoryName] + '</div>';
              html = template(response, fields);
              id
              id          = letterID + resultID;
              id = resultID;
              if( $.isFunction(settings.onSelect) ) {
              if( $.isPlainObject( object[camelCaseValue] ) && (depth != maxDepth) ) {
              if( $result.filter('.' + className.active).length > 0 ) {
              if( module.can.show() ) {
              if($.isPlainObject(settings.source) || $.isArray(settings.source)) {
              if(console.table) {
              if(href) {
              if(isProperObject) {
              if(response[fields.url]) {
              if(result[fields.description] !== undefined) {
              if(result[fields.image] !== undefined) {
              if(result[fields.price] !== undefined) {
              if(result[fields.title] !== undefined) {
              if(searchTerm !== undefined && response[fields.results] !== undefined) {
              if(term.charCodeAt(nextCharacterIndex++) === queryCharacter) {
              if(value) {
              inputEvent   = (prompt !== undefined && prompt.oninput !== undefined)
              letterID = String.fromCharCode(97 + categoryIndex);
              letterID,
              lookupFields = ['title', 'id'],
              matchRegExp  = new RegExp(regExp.beginsWith + searchExp, 'i'),
              module.addResults(cache.html);
              module.cancel.query();
              module.debug = Function.prototype.bind.call(console.info, console, settings.name + ':');
              module.debug('Clearing cache', value);
              module.debug('Finding result in results object', value);
              module.debug('Finding result that matches', value);
              module.debug('Hiding results with css animations');
              module.debug('Hiding results with javascript');
              module.debug('onResultsAdd callback cancelled default action');
              module.debug('Querying for', searchTerm);
              module.debug('Reading result from cache', searchTerm);
              module.debug('Removing value from cache', value);
              module.debug('Search result selected');
              module.debug('Showing results with css animations');
              module.debug('Showing results with javascript');
              module.debug.apply(console, arguments);
              module.error(error.noTemplate, false);
              module.error(error.source);
              module.hideResults();
              module.inject.id(cache.results);
              module.performance.log(arguments);
              module.performance.log(arguments);
              module.query();
              module.query();
              module.remove.focus();
              module.resultsClicked = false;
              module.resultsClicked = true;
              module.save.results(cache.results);
              module.set.buttonPressed();
              module.setup.api();
              module.timer = setTimeout(module.hideResults, settings.hideDelay);
              module.verbose = Function.prototype.bind.call(console.info, console, settings.name + ':');
              module.verbose('Checking cache for generated html for query', name);
              module.verbose('Creating category result id', id);
              module.verbose('Creating result id', id);
              module.verbose('Down key pressed, changing active result');
              module.verbose('Enter key pressed, executing query');
              module.verbose('Enter key pressed, selecting active result');
              module.verbose('Up key pressed, changing active result');
              module.verbose('Writing generated html to cache', name, value);
              module.verbose.apply(console, arguments);
              newIndex = (currentIndex + 1 >= resultSize)
              newIndex = (currentIndex - 1 < 0)
              numCharacters = searchTerm.length
              pageLostFocus = (document.activeElement === this)
              performance.push({
              previousTime
              previousTime  = time || currentTime;
              prompt = $prompt[0],
              queryCharacter = query.charCodeAt(characterIndex)
              result       = false
              result = module.search.object(value, results, lookupFields)[0];
              resultID      = (resultIndex + 1), // not zero indexed
              resultIndex   = 0
              results      = [],
              results : results
              results = $module.data(metadata.results)
              results = module.search.object(searchTerm, settings.content),
              results: results
              return (typeof cache == 'object') && (cache[name] !== undefined)
              return [];
              return false;
              searchExp    = searchTerm.toString().replace(regExp.escape, '\\$&'),
              searchFields = [searchFields];
              searchHTML
              searchHTML
              searchHTML = module.generateResults(response)
              searchTerm    = module.get.value(),
              settings.onSearchQuery.call(element, searchTerm);
              settings.searchFields = parameters.searchFields;
              time          = currentTime;
              title += ' ' + '(' + $allModules.length + ')';
              title += ' \'' + moduleSelector + '\'';
              title = settings.name + ':',
              totalTime += data['Execution Time'];
              totalTime = 0
              upArrow   : 38,
              var
              var camelCaseValue = (depth != maxDepth)
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              }
              });
              });
              });
              });
              });
              },
            $.each(category.results, function(index, result) {
            $.each(performance, function(index, data) {
            $.each(query, function(depth, value) {
            $.each(searchFields, function(index, field) {
            $.extend(true, apiSettings, settings.apiSettings);
            $.extend(true, module, name);
            $.extend(true, settings, name);
            $category    = $module.find(selector.category),
            $module
            $module
            $module.addClass(className.focus);
            $module.addClass(className.loading);
            $module.api(apiSettings);
            $module.data(metadata.results, results);
            $module.removeClass(className.focus);
            $module.removeClass(className.loading);
            $prompt
            $prompt
            $result      = $module.find(selector.result),
            $searchButton.addClass(className.pressed);
            $searchButton.removeClass(className.pressed);
            $selectedResult
            + '</div>'
            + '<div class="description">' + message + '</div class="description">'
            + '<div class="header">No Results</div class="header">'
            .data(moduleNamespace, module)
            .html(html)
            .off(eventNamespace)
            .removeData(moduleNamespace)
            // each item inside category
            // exit conditions if no source
            // force selector refresh
            // iterate through search fields looking for matches
            // query shortcuts
            // search fields should be array to loop correctly
            // this is the only setting which should not extend defaults
            // this makes sure $.extend does not add specified search fields to default fields
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            ;
            cache = module.read.cache(searchTerm)
            clearTimeout(module.performance.timer);
            clearTimeout(module.performance.timer);
            clearTimeout(module.timer);
            click: function(event) {
            currentIndex = $result.index( $result.filter('.' + className.active) ),
            else if(keyCode == keys.downArrow) {
            else if(keyCode == keys.upArrow) {
            else if(value && cache && cache[value]) {
            else {
            else {
            else {
            else {
            else {
            else {
            else {
            else {
            else {
            found,
            html           = ''
            html  += ''
            html  += '<a class="result" href="' + response[fields.url] + '">';
            html  += '<a class="result">';
            html  += '<div class="category">';
            html += ''
            html += '<div class="description">' + result[fields.description] + '</div>';
            html += '<div class="price">' + result[fields.price] + '</div>';
            html += '<div class="title">' + result[fields.title] + '</div>';
            html = module.displayMessage(error.noResults, 'empty');
            if( !$module.api('get request') ) {
            if( (console.group !== undefined || console.table !== undefined) && performance.length > 0) {
            if( module.can.transition() ) {
            if( module.can.transition() ) {
            if( module.can.useAPI() ) {
            if( module.has.minimumCharacters() ) {
            if( settings.onResultsAdd.call($results, html) === false ) {
            if(!$.isArray(searchFields)) {
            if(!pageLostFocus && !module.resultsClicked) {
            if(!value) {
            if($.isFunction(template)) {
            if($allModules.length > 1) {
            if($results.length === 0) {
            if(cache) {
            if(category[fields.categoryName] !== undefined) {
            if(categoryIndex !== undefined) {
            if(keyCode == keys.enter) {
            if(keyCode == keys.enter) {
            if(moduleSelector) {
            if(parameters && parameters.searchFields !== undefined) {
            if(response !== undefined) {
            if(settings.automatic) {
            if(settings.cache) {
            if(settings.cache) {
            if(settings.maxResults > 0) {
            if(settings.performance) {
            if(settings.performance) {
            if(settings.performance) {
            if(settings.type == 'category') {
            if(settings.type === 'category') {
            if(settings.type === 'category') {
            if(source === undefined || source === false) {
            isProperArray  = ($.isArray(response[fields.results]) && response[fields.results].length > 0),
            isProperObject = ($.isPlainObject(response[fields.results]) && !$.isEmptyObject(response[fields.results])),
            keyCode      = event.which,
            keys         = {
            maxDepth = query.length - 1;
            maxDepth,
            module.addResults(searchHTML);
            module.cancel.query();
            module.debug('Executing search', apiSettings);
            module.debug('Injecting unique ids into results');
            module.debug('Returned local search results', results);
            module.hideResults();
            module.inject.id(results);
            module.performance.timer = setTimeout(module.performance.display, 500);
            module.remove.loading();
            module.save.results(results);
            module.set.focus();
            module.set.loading();
            module.showResults();
            module.timer = setTimeout(module.query, settings.searchDelay);
            module.verbose('Binding events to search');
            module.verbose('Escape key pressed, blurring search field');
            module.verbose('First request, initializing API');
            module.verbose('Injecting result into results');
            module.verbose('Injecting results metadata', $selectedResult);
            module.verbose('Parsing server response', response);
            module.verbose('Saving current search results to metadata', results);
            module.verbose('Setting search input value', value);
            module.write.cache(searchTerm, {
            module[name] = value;
            mousedown: function() {
            mouseup: function() {
            newIndex
            object = instance,
            performance = [];
            query    = query.split(/[\. ]/);
            queryLength = query.length
            response
            response = found.apply(context, passedArguments);
            response = found;
            results = (results !== undefined)
            resultSize   = $result.length,
            return $.fn.api !== undefined;
            return $.merge(results, fuzzyResults);
            return $prompt.val();
            return ($prompt.filter(':focus').length > 0);
            return ($results.filter(':visible').length > 0);
            return ($results.html() === '');
            return (numCharacters >= settings.minCharacters);
            return (query === term);
            return false;
            return false;
            return false;
            return false;
            return id;
            return inputEvent;
            return module.is.focused() && !module.is.visible() && !module.is.empty();
            return module[name];
            return result || false;
            return results;
            return results;
            return settings.transition && $.fn.transition !== undefined && $module.transition('is supported');
            return settings[name];
            returnedValue = [returnedValue, response];
            returnedValue = response;
            returnedValue.push(response);
            searchFields = (searchFields !== undefined)
            searchHTML = module.generateResults({
            searchTerm = module.get.value(),
            settings.onResultsClose.call($results);
            settings.onResultsOpen.call($results);
            settings[name] = value;
            source = source || settings.source;
            template       = settings.templates[settings.type],
            termLength  = term.length,
            time = false;
            title += ' ' + totalTime + 'ms';
            type = type || settings.type;
            value = (value !== undefined)
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            var
            while(nextCharacterIndex < termLength) {
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            }
            });
            });
            });
            });
            });
            });
            },
            },
            },
          "&": "&amp;",
          "'": "&#x27;",
          "<": "&lt;",
          ">": "&gt;",
          "`": "&#x60;"
          $module
          $module
          $results
          '"': "&quot;",
          +   response[fields.action][fields.actionText]
          +   response[fields.action][fields.actionText]
          + '</a>';
          + '</a>';
          + '<a href="' + response[fields.action][fields.actionURL] + '" class="action">'
          + '<a href="' + response[fields.action][fields.actionURL] + '" class="action">'
          + '<div class="message ' + type + '">'
          // search shortcuts
          : $.extend({}, $.fn.search.settings),
          ;
          ;
          ;
          ;
          ;
          ;
          ;
          ;
          ;
          ;
          ? $.extend(true, {}, $.fn.search.settings, parameters)
          api: function() {
          blur: function(event) {
          buttonPressed: function() {
          buttonPressed: function() {
          cache: function(name) {
          cache: function(name, value) {
          cache: function(value) {
          context         = element         || context;
          display: function() {
          else if(found !== undefined) {
          else if(response !== undefined) {
          else if(returnedValue !== undefined) {
          else if(value !== undefined) {
          else if(value !== undefined) {
          else {
          else {
          else {
          else {
          else {
          else {
          empty: function() {
          events: function() {
          focus: function() {
          focus: function() {
          focus: function() {
          focused: function() {
          html  += ''
          html += ' <div class="description">' + message + '</div>';
          html += ''
          html += ''
          html += ''
          html += '</a>';
          html += '<div class="content">';
          id: function(resultIndex, categoryIndex) {
          id: function(results) {
          if( $.isFunction( found ) ) {
          if( $.isFunction(settings.onResultsAdd) ) {
          if( $.isPlainObject(name) ) {
          if( $.isPlainObject(name) ) {
          if( module.can.show() ) {
          if( module.has.minimumCharacters() )  {
          if( module.is.visible() ) {
          if( module.is.visible() ) {
          if(!module.is.visible()) {
          if($.isArray(returnedValue)) {
          if(category[fields.results] !== undefined && category.results.length > 0) {
          if(isProperObject || isProperArray ) {
          if(keyCode == keys.escape) {
          if(queryLength === termLength) {
          if(queryLength > termLength) {
          if(response[fields.url]) {
          if(result[fields.description] !== undefined) {
          if(result[fields.image] !== undefined) {
          if(result[fields.price] !== undefined) {
          if(result[fields.title] !== undefined) {
          if(settings.debug) {
          if(settings.verbose && settings.debug) {
          if(typeof query !== 'string') {
          if(typeof query == 'string' && object !== undefined) {
          input: function() {
          inputEvent: function() {
          instance = module;
          instance.invoke('destroy');
          loading: function() {
          loading: function() {
          local: function(searchTerm) {
          log: function(message) {
          minimumCharacters: function() {
          module.addResults( settings.templates.message(text, type) );
          module.bind.events();
          module.create.results();
          module.debug('Displaying message', text, type);
          module.debug('Generating html from response', response);
          module.determine.searchFields();
          module.error = Function.prototype.bind.call(console.error, console, settings.name + ':');
          module.error.apply(console, arguments);
          module.initialize();
          module.instantiate();
          module.set.type();
          module.verbose('Destroying instance');
          module.verbose('Initializing module');
          module.verbose('Storing instance of module', module);
          object: function(searchTerm, source, searchFields) {
          passedArguments = passedArguments || queryArguments;
          query = query.toLowerCase();
          query: function() {
          remote: function(searchTerm) {
          response: function(response, searchTerm) {
          result: function(result, resultIndex, categoryIndex) {
          result: function(value, results) {
          result: {
          results: function() {
          results: function() {
          results: function(results) {
          return escape[chr];
          return found;
          return html;
          return settings.templates.message(text, type);
          return true;
          search: for (var characterIndex = 0, nextCharacterIndex = 0; characterIndex < queryLength; characterIndex++) {
          searchFields: function() {
          settings.onResults.call(element, response);
          show: function() {
          term  = term.toLowerCase();
          transition: function() {
          type = type || 'standard';
          type: function(type) {
          useAPI: function() {
          value: function() {
          value: function(value) {
          var
          var
          var
          var
          var
          visible: function() {
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          }
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
          },
        $.each(response[fields.categoryResults], function(index, category) {
        $.each(response[fields.results], function(index, result) {
        $category       = $module.find(selector.category),
        $module         = $(this),
        $prompt         = $module.find(selector.prompt),
        $result         = $module.find(selector.result),
        $results        = $module.find(selector.results),
        $searchButton   = $module.find(selector.searchButton),
        // each category
        // each result
        // message type
        ;
        addResults: function(html) {
        badChars     = /[&<>"'`]/g,
        bind: {
        can: {
        cancel: {
        className       = settings.className,
        clear: {
        create: {
        debug: function() {
        destroy: function() {
        determine: {
        displayMessage: function(text, type) {
        element         = this,
        else {
        error           = settings.error,
        error: function() {
        escape       = {
        escape = $.fn.search.settings.templates.escape
        escapedChar  = function(chr) {
        event: {
        eventNamespace  = '.' + namespace,
        fields          = settings.fields,
        fuzzySearch: function(query, term) {
        generateResults: function(response) {
        get: {
        handleKeyboard: function(event) {
        has: {
        hideResults: function() {
        html +=  ''
        html += '</div>';
        html = ''
        html = ''
        html = '',
        if(instance !== undefined) {
        if(instance === undefined) {
        if(response[fields.action]) {
        if(response[fields.action]) {
        if(type == 'empty') {
        initialize: function() {
        inject: {
        instance        = $module.data(moduleNamespace),
        instantiate: function() {
        internal: function(name, value) {
        invoke: function(query, passedArguments, context) {
        is: {
        metadata        = settings.metadata,
        module
        module.initialize();
        module.invoke(query);
        moduleNamespace = namespace + '-module',
        namespace       = settings.namespace,
        parse: {
        performance: {
        query: function() {
        read: {
        regExp          = settings.regExp,
        remove: {
        return html;
        return html;
        return string.replace(badChars, escapedChar);
        save: {
        search: {
        selector        = settings.selector,
        set: {
        setting: function(name, value) {
        settings          = ( $.isPlainObject(parameters) )
        setup: {
        shouldEscape = /[&<>"'`]/,
        showResults: function() {
        verbose: function() {
        write: {
        }
        }
        }
        }
        }
        }
        }
        }
        });
        });
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
        },
      ;
      ;
      ;
      ;
      ;
      else {
      if(message !== undefined && type !== undefined) {
      if(methodInvoked) {
      if(response[fields.categoryResults] !== undefined) {
      if(response[fields.results] !== undefined) {
      if(shouldEscape.test(string)) {
      module = {
      return false;
      return false;
      return html;
      return string;
      var
      var
      var
      var
      var
      }
      }
      }
      }
      }
      }
      };
    $allModules     = $(this),
    'description'
    'title',
    .each(function() {
    : this
    ? returnedValue
    action          : 'action',      // "view more" object name
    actionText      : 'text',        // "view more" text
    actionURL       : 'url'          // "view more" url
    active  : 'active',
    beginsWith : '(?:\s|^)'
    cache   : 'cache',
    categories      : 'results',     // array of categories (category view)
    category     : '.category',
    category: function(response, fields) {
    categoryName    : 'name',        // name of category (category view)
    categoryResults : 'results',     // array of results (category view)
    description     : 'description', // result description
    empty   : 'empty',
    escape     : /[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,
    escape: function(string) {
    focus   : 'focus',
    image           : 'image',       // result image
    loading : 'loading',
    logging     : 'Error in debug logging, exiting.',
    maxResults  : 'Results must be an array to use maxResults setting',
    message: function(message, type) {
    method      : 'The method you called is not defined.'
    methodInvoked   = (typeof query == 'string'),
    moduleSelector  = $allModules.selector || '',
    noEndpoint  : 'No search endpoint was specified',
    noResults   : 'Your search returned no results',
    noTemplate  : 'A valid template name was not specified.',
    performance     = [],
    pressed : 'down'
    price           : 'price',       // result price
    prompt       : '.prompt',
    query           = arguments[0],
    queryArguments  = [].slice.call(arguments, 1),
    result       : '.result',
    result  : 'result'
    results         : 'results',     // array of results (standard)
    results      : '.results',
    results : 'results',
    results : 'results',
    returnedValue
    searchButton : '.search.button',
    serverError : 'There was an issue querying the server.',
    source      : 'Cannot search. No source used, and Semantic API module was not included',
    standard: function(response, fields) {
    time            = new Date().getTime(),
    title           : 'title',       // result title
    title        : '.title, .name'
    }
    })
    },
    },
    },
  $(this)
  // API config
  // callbacks
  // delay before hiding menu after blur
  // delay before searching
  // field to display in standard results template
  // fields to search
  // maps api response attributes to internal representation
  // maximum results returned from local
  // minimum characters required to search
  // object to search
  // template to use (specified in settings.templates)
  // transition settings
  // whether to add events to prompt automatically
  // whether to include fuzzy results in local search
  // whether to store lookups in local cache
  ;
  ;
  ;
  ],
  apiSettings    : false,
  automatic      : true,
  cache          : true,
  className: {
  debug          : false,
  displayField   : '',
  duration       : 200,
  easing         : 'easeOutExpo',
  error : {
  fields: {
  hideDelay      : 0,
  maxResults     : 7,
  metadata: {
  minCharacters  : 1,
  name           : 'Search',
  namespace      : 'search',
  onResults      : function(response){},
  onResultsAdd   : false,
  onResultsClose : function(){},
  onResultsOpen  : function(){},
  onSearchQuery  : function(query){},
  onSelect       : false,
  performance    : true,
  regExp: {
  return (returnedValue !== undefined)
  searchDelay    : 200,
  searchFields   : [
  searchFullText : true,
  selector : {
  source         : false,
  templates: {
  transition     : 'scale',
  type           : 'standard',
  var
  verbose        : false,
  }
  },
  },
  },
  },
  },
  },
 *
 *
 *
 * # Semantic UI 2.0.7 - Search
 * Copyright 2015 Contributors
 * http://github.com/semantic-org/semantic-ui/
 * http://opensource.org/licenses/MIT
 * Released under the MIT license
 */
"use strict";
$.fn.search = function(parameters) {
$.fn.search.settings = {
/*!
;(function ($, window, document, undefined) {
})( jQuery, window , document );
};
};