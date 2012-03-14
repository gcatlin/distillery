# Actual TODOs
- Namespaces
- DQL Distillery Query Language?

# References
- http://code.google.com/appengine/docs/python/datastore/
- http://code.google.com/appengine/docs/go/datastore/overview.html
- http://www.objectdb.com/java/jpa
- http://martinfowler.com/eaaCatalog/
- http://en.wikipedia.org/wiki/Data_access_object
- http://en.wikipedia.org/wiki/Data_access_layer
- http://en.wikipedia.org/wiki/Domain_model

# PoEAA
## Layers
- Domain Model
- Repository
- Data Mapper
- Data Store

## Domain Logic Patterns
- Domain Model - an object model of the domain that incorporates both behavior and data.
- Service Layer

## Object-Relational Metadata Mapping Patterns
- Repository - mediates between the domain and data mapping layers using a collection-like interface for accessing domain objects
- Metadata Mapping - holds details of object-relational mapping in metadata
- Query Object - refers to classes and fields rather than tables and columns

## Data Source Architectural Patterns
- Data Mapper

## Object-Relational Behavioral Patterns:
- Unit of Work - maintains a list of objects affected by a business transaction and coordinates the writing out of changes and the resolution of concurrency problems
- Identity Map - Ensures that each object gets loaded only once by keeping every loaded object in a map
- Lazy Load

## Object-Relational Structural Patterns
- Identity Field
- Foreign Key Mapping
- Association Table Mapping
- Dependent Mapping
- Embedded Value
- Serialized LOB
- Single Table Inheritance
- Class Table Inheritance
- Concrete Table Inheritance
- Inheritance Mappers

# Entity
- AbstractEntity
	- GeneratedConcreteEntity
		- ConcreteEntity

# Relationship Patterns
- is a (hierarchy)
- has one (composition)
- has many (composition)

# distillery-lint
- Ensures ConcreteEntity extends GeneratedConcreteEntity or AbstractEntity

# DSL

# Code Generation

# Exceptions
- BadArgumentError()
- BadFilterError()
- BadKeyError()
- BadPropertyError()
- BadQueryError()
- BadRequestError()
- BadValueError()
- ConfigurationError()
- DuplicatePropertyError()
- Error()
- InternalError()
- KindError()
- NeedIndexError()
- NotSavedError()
- PropertyError()
- ReferencePropertyResolveError()
- ReservedWordError()
- Rollback()
- Timeout()
- TransactionFailedError()
