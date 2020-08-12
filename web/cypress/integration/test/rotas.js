/* eslint no-use-before-define: 0 */
describe('Teste de Rotas', () => {
    it('Home', () => {
      cy.visit('/');
    });

    it('Login', () => {
      cy.visit('/login');
    })

    it('Create Quiz', () => {
      cy.visit('/createQuiz');
    })

    it('View Quiz', () => {
      cy.visit('/viewQuiz');
    })

    it('Edit Quiz', () => {
      cy.visit('/editQuiz');
    })
  });
  