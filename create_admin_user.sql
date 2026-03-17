-- Δημιουργία admin χρήστη με bcrypt hash
INSERT INTO users (username, email, password, role)
VALUES (
  'superadmin',
  'admin@demo.gr',
  '$2b$12$5qdYofuevNmLIaDDVexXDOmT/OtQpwtdqsxmEt/6u2IfD/vOI7pxy',
  'admin'
);